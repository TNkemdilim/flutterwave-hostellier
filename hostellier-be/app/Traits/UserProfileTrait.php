<?php

namespace App\Traits;

/**
 * Vendore Packages
 */
use JsonResponse;

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
    public function showProfile() : JsonResponse
    {
        // if ($this->accountType  == UserEnum::STUDENT) {
        //     // add booking data if need be. 
        // }

        return response()->json(
            [
                'status' => true,
                'data' => [
                    'user' => array_merge(
                        $this->user()->toArray(), 
                        $this->specificUserDetails()->toArray()
                    ),
                ]
            ], 200
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
