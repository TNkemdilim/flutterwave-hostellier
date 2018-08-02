<?php

namespace App\Traits;

/**
 * Vendore Packages
 */

/**
 * General Imports
 */
use App\Http\Requests\Profile\UpdateProfileRequest;

/**
 * Utilities /Enum
 */
use App\Utilities\Constants\UserEnum;

trait UserProfileTrait
{
    /**
     * Shows the profile of the current user.
     *
     * @return JsonResponse
     */
    public function showProfile()
    {
        // if ($this->accountType  == UserEnum::STUDENT) {
        //     // add booking data if need be. 
        // }

        return self::successJsonResponse(
            "Successully retrived student profile",
            array_merge(
                auth()->user()->toArray(), 
                $this->specificUserDetails()->toArray()
            ), 200
        );
    }

    /**
     * Updates the profile/user details of a user
     *
     * @param UpdateProfileRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
        return $request->updateProfile();
    }
}
