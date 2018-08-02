<?php

namespace App\Http\Requests\Profile;

use JsonResponse;
use Illuminate\Validation\Rule;
use App\Http\Requests\BaseFormRequest;
use App\Models\Student;

class UpdateProfileRequest extends BaseFormRequest
{
    use JsonResponse;

    private $_model;

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
        $user = auth()-user();

        if ($user->isStudent()) {
            $this->_model = $user->student();
            return Student::getValidationRulesForUpdate();
        }
        
        return [
            //
        ];
    }

    /**
     * Updates the user's profile data.
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateProfile() 
    {
        return successJsonResponse(
            'Successfully updated profile.',
            $this->_model->update($this->all())
        );
    }
}
