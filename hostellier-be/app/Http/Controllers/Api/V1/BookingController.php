<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\StudentOnCampusBooking;
use App\Models\StudentOffCampusBooking;
use App\Http\Requests\Booking\CreateOnCampusBookingRequest;
use App\Http\Requests\Booking\CreateOffCampusBookingRequest;

class BookingController extends Controller
{
    /**
     * Book a room off-campus.
     *
     * @param \App\Http\Requests\Booking\CreateOffCampusBookingRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function createOffCampusBooking(CreateOffCampusBookingRequest $request) 
    {
        return $request->createBooking();
    }

    /**
     * Book a room on-campus.
     *
     * @param \App\Http\Requests\Booking\CreateOnCampusBookingRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function createOnCampusBooking(CreateOnCampusBookingRequest $request) 
    {
        return $request->createBooking();
    }

    /**
     * Get the off-campus booking.
     *
     * @param \App\Models\StudentOffCampusBooking $booking 
     * 
     * @return \Illuminate\Http\Response
     */
    public function getOffCampusBooking(StudentOffCampusBooking $booking) 
    {
        try {
            return successJsonResponse(
                'Successfully retrieved off-campus booking.',
                StudentOffCampusBooking::findOrFail($booking->id)
            );
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified off-campus booking doesn\'t exist.'
            );
        }
    }

    /**
     * Get the on-campus booking.
     *
     * @param \App\Models\StudentOnCampusBooking $booking 
     * 
     * @return \Illuminate\Http\Response
     */
    public function getOnCampusBooking(StudentOnCampusBooking $booking)
    {
        try {
            return successJsonResponse(
                'Successfully retrieved on-campus booking.',
                StudentOnCampusBooking::findOrFail($booking->id)
            );
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified on-campus booking doesn\'t exist.'
            );
        }
    }

    /**
     * Delete an off-campus booking.
     *
     * @param \App\Models\StudentOffCampusBooking $booking 
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyOffCampusBooking(StudentOffCampusBooking $booking) 
    {
        try {
            StudentOffCampusBooking::findOrFail($booking->id)->delete();
            return successJsonResponse('Successfully deleted off-campus booking.');
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified off-campus booking doesn\'t exist.'
            );
        }
    }

    /**
     * Delete an on-campus booking.
     *
     * @param \App\Models\StudentOnCampusBooking $booking 
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyOnCampusBooking(StudentOnCampusBooking $booking) 
    {
        try {
            StudentOnCampusBooking::findOrFail($booking->id)->delete();
            return successJsonResponse('Successfully deleted on-campus booking.');
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified on-campus booking doesn\'t exist.'
            );
        }
    }
}
