<?php

namespace App\Http\Controllers\Api\V1;

/**
 * Vendor Packages
 */

/**
 * General Imports
 */
use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterStudentRequest;
use App\Http\Requests\Authentication\ChangePasswordRequest;

/**
 * Utilities / Enums
 */
use App\Utilities\Constants\UserEnum;

class AuthController extends Controller
{
    /**
     * Login a user {Student | Admin}.
     *
     * @param LoginRequest $request  
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request, $accountType)
    {
        return $request->login($accountType);
    }

    /**
     * Register a new student.
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
     * Register a new student.
     *
     * @param RegisterStudentRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function registerAdmin(RegisterAdminRequest $request)
    {
        return $request->registerAdmin();
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
