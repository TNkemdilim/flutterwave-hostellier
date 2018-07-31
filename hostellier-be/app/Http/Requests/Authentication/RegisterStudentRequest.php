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
        return [
            'email' => 'required|email|string|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'c_password' => 'required|string|same:password',

            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'timezone' => 'required|timezone'
        ];
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
                    'message' => 'Sorry, registration failed.',
                ], 401
            );
        }

        $newUser = User::create(
            [
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'account_type_id' => $accountTypeDBId,
            ]
        );

        $newInfluencer = Student::create(
            [
                'user_id' => $newUser->id,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'wavecoin' => 0.0,
                'score' => 0.0,
                'timezone' => $request->timezone,
            ]
        );

        SendMailQueue::dispatch(new WelcomeNewInfluencer($newUser), $newUser);

        return response()->json(
            [
                'status' => true,
                'message' => 'Successfully registered user.',
            ], 200
        );
    }
}
