<?php

namespace App\Http\Requests\Authentication;

use App\Utilities\Constants\UserEnum;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\Student;

class RegisterStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return Student::getValidationRulesForCreate();
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
            return response()->json(
                [
                    'status' => false,
                    'message' => 
                        "Sorry, we currently do not support user type of 
                        ${UserEnum::STUDENT}.",
                ], 500
            );
        }

        $newUser = User::create(
            [
                'email' => $this->email,
                'password' => bcrypt($this->password),
                'account_type_id' => $accountTypeDBId,
            ]
        );

        $newStudent = Student::create(
            [
                'user_id' => $newUser->id,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'level' => $this->level,
            ]
        );

        // Send mail to user by dispatching to email sending queue.

        return response()->json(
            [
                'status' => true,
                'message' => 'Successfully registered student.',
            ], 200
        );
    }
}
