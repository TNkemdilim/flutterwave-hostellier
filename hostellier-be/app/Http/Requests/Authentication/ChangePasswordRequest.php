<?php

namespace App\Http\Requests\Authentication;

use Hash;
use App\Utilities\Response\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    use JsonResponse;

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
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        $loggedInUser = auth()->user();

        if (!Hash::check($this->current_password, $loggedInUser->password)) {
            return failedJsonResponse($message = 'Incorrect password specified.');
        }
        
        $user = User::find($loggedInUser->id);
        $user->password = bcrypt($this->new_password);
        $data = $user->save();

        return successJsonResponse(
            $message = 'Successully changed your password.',
            $data = $data
        );
    }
}
