<?php

namespace App\Http\Requests\Room;

use App\Models\OnCampusRoom;
use App\Http\Requests\BaseFormRequest;

class CreateOnCampusRoomRequest extends BaseFormRequest
{
    use JsonResponse;

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
        return OnCampusRoom::getValidationRulesForCreate();
    }

    /**
     * Create an on-campus room.
     * 
     * @return \Illuminate\Http\Response
     */
    public function createRoom()
    {
        return successJsonResponse(
            'Successfully created on-campus room.',
            OnCampusRoom::create($this->all())
        );
    }
}
