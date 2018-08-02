<?php

namespace App\Http\Requests\Authentication;

use App\Utilities\Constants\UserEnum;
use App\Http\Requests\BaseFormRequest;
use App\Models\User;
use App\Models\Student;
use App\Models\UserType;

class RegisterStudentRequest extends BaseFormRequest
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
        return array_merge(
            User::getValidationRulesForCreate(),
            Student::getValidationRulesForCreate()
        );
    }

    /**
     * Register a student.
     * 
     * @return void
     */
    public function registerStudent()
    {
        $accountTypeDBId = UserType::where('name', UserEnum::STUDENT)->first()->id;

        if (is_null($accountTypeDBId)) {
            return self::failedJsonResponse(
                "Sorry, we currently do not support user type of 
                ${UserEnum::STUDENT}."
            );
        }

        try {
            $newUser = User::create(
                [
                    'email' => $this->email,
                    'password' => bcrypt($this->password),
                    'user_type_id' => $accountTypeDBId,
                ]
            );
        } catch(\Illuminate\Database\QueryException $ex) {
            return self::failedJsonResponse('User already exists');
        }

        $newStudent = Student::create(
            array_merge(
                [
                   'user_id' => $newUser->id,
                   'firstname' => $this->firstname,
                   'lastname' => $this->lastname,
                ],
                isset($this->level) ? [ 'level' => $this->level] : []
            )
        );

        // Send mail to user by dispatching to email sending queue.

        return self::successJsonResponse('Successfully registered student.');
    }
}
