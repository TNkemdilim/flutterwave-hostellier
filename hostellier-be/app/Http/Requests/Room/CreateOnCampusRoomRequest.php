<?php

namespace App\Http\Requests\Room;

use App\Models\OnCampusRoom;
use Illuminate\Foundation\Http\FormRequest;
use App\Utilities\Response\JsonResponse;

class CreateOnCampusRoomRequest extends FormRequest
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
        return successResponse(
            'Successfully created on-campus room.',
            OnCampusRoom::create($this->all())
        );
    }
}
