<?php

namespace App\Http\Controllers;

use App\Traits\UserProfileTrait;
use Illuminate\Http\Request;
use App\Utilities\Constants\UserEnum;
use App\Models\Student;

class StudentController extends Controller
{
    use UserProfileTrait;
    /**
     * The table of the students model.
     */
    protected $table = Student::class;

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

    /**
     * Get all the rooms booked by a student (both on-campus & off-campus).
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAllBookings()
    {
        $student = $this->specificUserDetails();

        return successJsonResponse(
            $message = 'Successfully retrieved student bookings.',
            $data = [
                'bookings' => [
                    'on_campus' => $student->onCampusBookings()->get(),
                    'off_campus' => $student->offCampusBookings()->get()
                ]
            ]
        );
    }

    /**
     * Get all off-campus bookings for a student.
     * 
     * @return JsonResponse
     */
    public function getAllOffCampusBookings()
    {
        $student = $this->specificUserDetails();

        return successJsonResponse(
            $message = 'Successfully retrieved student\'s off-campus bookings.',
            $data = [
                'bookings' => $student->offCampusBookings()->get()->toArray()
            ]
        );
    }

    /**
     * Get all on-campus bookings for a student.
     * 
     * @return \Illuminate\Http\Response
     */
    public function getAllOnCampusBookings()
    {
        $student = $this->specificUserDetails();

        return successJsonResponse(
            $message = 'Successfully retrieved student\'s off-campus bookings.',
            $data = [
                'bookings' => $student->offCampusBookings()->get()->toArray()
            ]
        );
    }
}
