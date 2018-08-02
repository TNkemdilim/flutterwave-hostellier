<?php

namespace App\Http\Requests\Booking;

use Flutterwave;
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
            'purchase_count' => 'required|numerice|min:1',
        ];
    }

    /**
     * Creates a booking off-campus.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function createBooking()
    {
        // Improve this later on.
        $flutterwave = config('flutterwave');
        $flutterwave = new Flutterwave($flutterwave['PRIVATE_KEY']);

        try
        {
            $roomOfPurchase = OffCampusRoom::findOrFail($this->off_campus_room_id);
        } catch (ModelNotFoundException $ex) {
            return self::failedJsonResponse('Invalid Off-campus room specified.');
        }

        try
        {
            $transaction = $flutterwave->makePurchase(
                $roomOfPurchase->price * $this->purchase_count, 
                "PURCHASED OFF-CAMPUS ROOM WITH ID: {$roomOfPurchase->id} 
                AT PRICE OF N{$roomOfPurchase->price}"
            );

            StudentOffCampusBooking::create(
                [
                    'student_id' => auth()->user()->student()->first()->id,
                    'off_campus_room_id' => $roomOfPurchase->id,
                    'transaction_reference' => $transaction['transaction_reference'],
                    'expiring_at' => $this->purchase_count // fix this by properly adding the months in advance
                ]
            );

            $roomOfPurchase->update(['booked' => true]);

            return self::successResponseJson(
                'Successfully booked off-campus room.',
                $roomOfPurchase
            );

        } catch (\Exception $ex)
        {
            // TO DO:
            // Return custom error message, to prevent returning crucial 
            // message back to client.
            return self::failureResponseJson($ex->getMessage());
        }
    }
}
