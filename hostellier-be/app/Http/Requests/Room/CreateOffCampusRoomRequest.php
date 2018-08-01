<?php

namespace App\Http\Requests\Room;

use App\Models\OffCampusRoom;
use Illuminate\Foundation\Http\FormRequest;
use App\Utilities\Response\JsonResponse;

class CreateOffCampusRoomRequest extends FormRequest
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
        return OffCampusRoom::getValidationRulesForCreate();
    }

    /**
     * Create an off-campus room.
     * 
     * @return \Illuminate\Http\Response
     */
    public function createRoom()
    {
        return successJsonResponse(
            'Successfully created off-campus room.',
            OffCampusRoom::create($this->all())
        );
    }
}
