<?php

namespace App\Http\Requests\Authentication;


use App\Utilities\Constants\UserEnum;
use App\Http\Requests\BaseFormRequest;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserType;
use Illuminate\Foundation\Http\FormRequest;

class RegisterAdminRequest extends BaseFormRequest
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
            Admin::getValidationRulesForCreate()
        );
    }

    /**
     * Register a admin.
     * 
     * @return void
     */
    public function registerAdmin()
    {
        $accountTypeDBId = UserType::where('name', UserEnum::ADMIN)->first()->id;

        if (is_null($accountTypeDBId)) {
            return self::failedJsonResponse(
                "Sorry, we currently do not support user type of 
                ${UserEnum::ADMIN}."
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
        } catch (\Illuminate\Database\QueryException $ex) {
            return self::failedJsonResponse('User already exists');
        }

        $newAdmin = Admin::create(
            [
                'user_id' => $newUser->id,
                'firstname' => $this->firstname,
                'lastname' => $this->lastname,
            ]
        );

        // Send mail to user by dispatching to email sending queue.

        return self::successJsonResponse('Successfully registered admin.');
    }
}
