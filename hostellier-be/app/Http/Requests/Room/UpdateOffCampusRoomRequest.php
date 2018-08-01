<?php

namespace App\Http\Requests\Room;

use App\Models\OnCampusRoom;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOffCampusRoomRequest extends FormRequest
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
            //
        ];
    }

    /**
     * Updates the specified off-campus room.
     * 
     * @param App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateRoom(OffCampusRoom &$room)
    {
        //
    }
}
