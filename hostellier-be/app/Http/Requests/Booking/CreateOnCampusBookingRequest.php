<?php

namespace App\Http\Requests\Booking;

use App\Http\Requests\BaseFormRequest;

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

    }
}
