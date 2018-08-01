<?php

namespace App\Http\Requests\Profile;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Student;

class UpdateProfileRequest extends FormRequest
{
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
     * @return JsonResponse
     */
    public function updateProfile() 
    {
        $this->_model->update($this->all());
    }
}
