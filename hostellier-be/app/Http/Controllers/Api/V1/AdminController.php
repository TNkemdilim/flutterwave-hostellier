<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Traits\UserProfileTrait;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use UserProfileTrait;
    /**
     * The table of the admins model.
     */
    protected $table = Admin::class;

    /**
     * Account type of the user;
     * 
     * This is a requirement for the UserProfileTrait implementation.
     */
    protected $accountType = UserEnum::ADMIN;

    /**
     * Get the basic details of the admin 
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
     * Get the specific user details of the admin.
     * 
     * This is a requirement for the UserProfileTrait implementation.
     * 
     * @return Object
     */
    protected function specificUserDetails()
    {
        return auth()->user()->admin()->first();
    }
}
