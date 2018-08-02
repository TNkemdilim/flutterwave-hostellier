<?php

namespace App\Http\Requests\Authentication;

use App\Http\Requests\BaseFormRequest;

use App\Utilities\Constants\UserEnum;

class LoginStudentRequest extends BaseFormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }


    /**
     * Process the login request.
     * 
     * @return void
     */
    public function loginStudent()
    {
        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 
                        'Invalid email/password. Please verify your credentials.'
                ], 401
            );
        }

        $user = auth()->user();

        if (!$user->isStudent()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 
                        'Invalid email/password. Please verify your credentials.'
                ], 401
            );
        }
        
        return response()->json(
            [
                'status' => true,
                'message' => 'Successully logged in.',
                'data' =>  array_merge(
                    $user->toArray(),
                    $user->student()->first()->toArray(),
                    ['token' => $user->createToken('ApiToken')->accessToken]
                )
            ], 200
        );
    }
}
