<?php

namespace App\Http\Requests\Authentication;

use Hash;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'c_new_password' => 'required|string|same:new_password'
        ];
    }

    /**
     * Change a user password.
     *
     * @return void
     */
    public function changePassword()
    {
        $loggedInUser = auth()->user();

        if (!Hash::check($this->current_password, $loggedInUser->password)) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Incorrect password specified.'
                ], 200
            );
        }
        
        $user = User::find($loggedInUser->id);
        $user->password = bcrypt($this->new_password);
        $data = $user->save();

        return response()->json(
            [
                'status' => true,
                'message' => 'Successully changed your password.',
                'data' => $data
            ], 200
        );
    }
}
