<?php

namespace App\Http\Requests\Booking;

use Paystack;
use App\Models\OnCampusRoom;
use App\Models\StudentOnCampusBooking;
use App\Http\Requests\BaseFormRequest;
use App\Exceptions\Booking\RoomFilledException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CreateOnCampusBookingRequest extends BaseFormRequest
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
            'on_campus_room_id' => 'required|numeric',
            'transaction_reference' => 'required|string',
            'purchase_count' => 'required|numerice|min:1',
        ];
    }

    /**
     * Creates a booking on-campus.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function createBooking()
    {
        try {
            $roomOfPurchase = OnCampusRoom::findOrFail($this->on_campus_room_id);

            if (++$roomOfPurchase->current_no_of_occupants > $roomOfPurchase->students_per_room) {
                throw new RoomFilledException();
            } else if ($roomOfPurchase->current_no_occupants == $roomOfPurchase->students_per_room) {
                $roomOfPurchase->booked == true;
            }

            $transaction = Paystack::verifyTransaction($this->transaction_reference);
            if (is_null($transaction)) {
                return self::failedJsonResponse("Transaction verification failed.");
            } else if ($transaction->amount != ($roomOfPurchase->price * $this->purchase_count)) {
                // Perform refund
                return self::failedJsonResponse("Mismatch amount.");
            }
        } catch (ModelNotFoundException $ex) {
            return self::failedJsonResponse('Invalid on-campus room specified.');
        } catch (RoomFilledException $ex) {
            return self::failedJsonResponse("The selected room you specified isn't vacant.");
        }

        StudentOnCampusBooking::create(
            [
                'student_id' => auth()->user()->student()->first()->id,
                'on_campus_room_id' => $roomOfPurchase->id,
                'transaction_reference' => $this->transaction_reference,
                'expiring_at' => $this->purchase_count // fix this by properly adding the months in advance
            ]
        );

        $roomOfPurchase->save(); // updates booking status.
        return self::successResponseJson(
            'Successfully booked off-campus room.',
            $roomOfPurchase
        );
    }
}
