<?php

namespace App\Http\Controllers;

use App\Traits\UserProfileTrait;
use Illuminate\Http\Request;
use App\Utilities\Constants\UserEnum;

class StudentController extends Controller
{
    use UserProfileTrait;

    /**
     * Account type of the user;
     * 
     * This is a requirement for the UserProfileTrait implementation.
     */
    protected $accountType = UserEnum::STUDENT;

    /**
     * Get the basic details of the student 
     * e.g. email, password hash, created_at, updated_at, id.
     * 
     * This is a requirement for the UserProfileTrait implementation.
     * 
     * @return Object
     */
    protected function user() 
    {
        return auth()->user();
    }

    /**
     * Get the specific user details of the student.
     * 
     * This is a requirement for the UserProfileTrait implementation.
     * 
     * @return Object
     */
    protected function specificUserDetails()
    {
        return auth()->user()->student();
    }
}
