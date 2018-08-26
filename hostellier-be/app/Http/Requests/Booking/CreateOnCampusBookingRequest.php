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
        ];
    }


    /**
     * Creates a booking for student.
     * 
     * @param Integer $onCampusRoomId  
     * @param String $txRef  
     * 
     * @return void
     */
    private function _createBookingForStudent($studentId, $onCampusRoomId, $txRef)
    {
        StudentOnCampusBooking::create(
            [
                'student_id' => $studentId,
                'on_campus_room_id' => $onCampusRoomId,
                'transaction_reference' => $txRef,
                'expiring_at' => date('Y-m-d H:m:s', strtotime("+1 year"))
            ]
        );
    }

    /**
     * Verify that the payment status corresponds with given price.
     *
     * @param String $transactionReference 
     * 
     * @return void
     */
    private function _verifyPaymentStatus($transactionReference, $roomPrice)
    {
        $transaction = Paystack::verifyTransaction($transactionReference);

        if (is_null($transaction)) {
            return self::failedJsonResponse("Transaction verification failed.");
        } else if ($transaction->amount != ($roomPrice)) {
            // Perform refund
            return self::failedJsonResponse("Mismatch amount.");
        }

        return true;
    }

    /**
     * Creates a booking on-campus.
     * 
     * @return \Illuminate\Http\Response 
     */
    public function createBooking()
    {
        if (auth()->user()->hasBookedOnCampusRoom()) {
            return self::failedJsonResponse(
                'Sorry, you currently have an active room on-campus.'
            );
        }

        try {
            $roomOfPurchase = OnCampusRoom::findOrFail($this->on_campus_room_id);

            if (++$roomOfPurchase->no_of_occupants > $roomOfPurchase->students_per_room) {
                throw new RoomFilledException();
            } else if ($roomOfPurchase->no_of_occupants == $roomOfPurchase->students_per_room) {
                $roomOfPurchase->booked = true;
            }

            $paymentStatus = $this->_verifyPaymentStatus(
                $this->transaction_reference,
                $roomOfPurchase->price
            );
            if (!$paymentStatus) {
                return $paymentStatus;
            }
        } catch (ModelNotFoundException $ex) {
            return self::failedJsonResponse('Invalid on-campus room specified.');
        } catch (RoomFilledException $ex) {
            return self::failedJsonResponse('The selected room you specified isn\' t vacant . ');
        }

        $this->_createBookingForStudent(
            auth()->user()->student()->first()->id,
            $roomOfPurchase->id,
            $this->transaction_reference
        );

        $roomOfPurchase->save(); // updates booking status.
        return self::successJsonResponse(
            'Successfully booked off-campus room.',
            $roomOfPurchase
        );
    }
}
