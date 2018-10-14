<?php

namespace App\Http\Requests\Room;

use App\Http\Requests\BaseFormRequest;
use App\Models\OffCampusRoom;
use App\Models\OnCampusRoom;

class DeleteRoomRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Delete the specified off-campus room.
     *
     * @param App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function deleteOffCampusRoom($roomId)
    {
        try {
            OffCampusRoom::findOrFail($roomId)->delete();
            return self::successJsonResponse(
                'Successfully deleted off-campus room.'
            );
        } catch (ModelNotFoundException $ex) {
            return self::failedJsonResponse(
                'The specified off-campus room doesn\'t exist.'
            );
        }
    }

    /**
     * Delete the specified ofncampus room.
     *
     * @param App\Models\OnCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function deleteOnCampusRoom($roomId)
    {
        try {
            OnCampusRoom::findOrFail($roomId)->delete();
            return self::successJsonResponse(
                'Successfully deleted on-campus room.'
            );
        } catch (\Exception $ex) {
            return self::failedJsonResponse(
                'The specified on-campus room doesn\'t exist.'
            );
        }
    }
}
