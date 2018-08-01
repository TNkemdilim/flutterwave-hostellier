<?php

namespace App\Http\Controllers\Api\V1;

/**
 * Vendor Packages
 */

/**
 * General Imports
 */
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginStudentRequest;
use App\Http\Requests\Authentication\RegisterStudentRequest;
use App\Http\Requests\Authentication\ChangePasswordRequest;

/**
 * Utilities / Enums
 */
use App\Utilities\Constants\UserEnum;

class AuthController extends Controller
{
    /**
     * Login a student.
     *
     * @param LoginStudentRequest $request  
     * 
     * @return \Illuminate\Http\Response
     */
    public function loginStudent(LoginStudentRequest $request)
    {
        return $request->loginStudent();
    }

    /**
     * Register a new influencer.
     *
     * @param RegisterStudentRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function registerStudent(RegisterStudentRequest $request)
    {
        return $request->registerStudent();
    }

    /**
     * Change a user password.
     *
     * @param Request $request  
     * 
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        return $request->changePassword();
    }
}
