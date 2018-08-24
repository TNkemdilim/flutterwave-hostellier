<?php

namespace App\Http\Requests\Booking;

use App\Integrations\Paystack\Paystack;
use App\Models\OffCampusRoom;
use App\Models\StudentOffCampusBooking;
use App\Http\Requests\BaseFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreateOffCampusBookingRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'off_campus_room_id' => 'required|numeric',
            'transaction_reference' => 'required|string',
            'purchase_count' => 'required|numeric|min:1',
        ];
    }

    /**
     * Creates a booking off-campus.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function createBooking()
    {
        try {
            $roomOfPurchase = OffCampusRoom::findOrFail($this->off_campus_room_id);
            $transaction = Paystack::verifyTransaction($this->transaction_reference);

            if (is_null($transaction)) {
                return self::failedJsonResponse("Transaction verification failed.");
            } else if (($transaction->amount / 100) != ($roomOfPurchase->price * $this->purchase_count)) {
                // Perform refund
                return self::failedJsonResponse("Mismatch amount.");
            }
        } catch (ModelNotFoundException $ex) {
            return self::failedJsonResponse('Invalid Off-campus room specified.');
        }

        StudentOffCampusBooking::create(
            [
                'student_id' => auth()->user()->student()->first()->id,
                'off_campus_room_id' => $roomOfPurchase->id,
                'transaction_reference' => $this->transaction_reference,
                'expiring_at' => date(
                    'Y-m-d H:m:s',
                    strtotime("+{$this->purchase_count} year")
                )
            ]
        );
        $roomOfPurchase->update(['booked' => true]);

        return self::successJsonResponse(
            'Successfully booked off-campus room.',
            $roomOfPurchase
        );
    }
}
