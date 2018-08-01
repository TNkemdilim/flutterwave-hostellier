<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\OffCampusRoom;
use App\Models\OnCampusRoom;
use Illuminate\Http\Request;
use App\Http\Requests\Room\CreateOffCampusRoomRequest;
use App\Http\Requests\Room\CreateOnCampusRoomRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoomController extends Controller
{
    /**
     * Get all on-campus and off-campus bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Todo: Optimize query by utilizing in-built `chunk(...)` method.
        return successResponse(
            'Successfully retrieved all rooms',
            [
                'on_campus' => OnCampusRoom::all(),
                'off_campus' => OffCampusRoom::all()
            ]
        );
    }

    /**
     * Get all off-campus bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOffCampusRooms()
    {
        // Todo: Optimize query by utilizing in-built `chunk(...)` method.
        return successResponse(
            'Successfully retrieved all off-campus rooms',
            OffCampusRoom::all()
        );
    }

    /**
     * Get all on-campus bookings.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOnCampusRooms()
    {
        // Todo: 
        // 1. Optimize query by utilizing in-built `chunk(...)` method.
        // 2. Return rooms available for a specific course of study.
        return successResponse(
            'Successfully retrieved all on-campus rooms',
            OnCampusRoom::all()
        );
    }

    /**
     * Create a new off-campus room.
     *
     * @param CreateOffCampusRoomRequest $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function createOffCampusRoom(CreateOffCampusRoomRequest $request)
    {
        return $request->createRoom();
    }

    /**
     * Create a new on-campus room.
     *
     * @param \Illuminate\Http\Request $request 
     * 
     * @return \Illuminate\Http\Response
     */
    public function createOnCampusRoom(CreateOnCampusRoomRequest $request)
    {
        return $request->createRoom();
    }

    /**
     * Get a specific off-campus room.
     *
     * @param App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function getOffCampusRoom(OffCampusRoom $room)
    {
        try {
            return successResponse(
                'Successfully retrieved off-campus room.',
                OffCampusRoom::findOfFail($room->id)
            );
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified off-campus room doesn\'t exist.'
            );
        }
    }

    /**
     * Get a specific on-campus room.
     *
     * @param App\Models\OnCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function getOnCampusRoom(OnCampusRoom $room)
    {
        try {
            return successResponse(
                'Successfully retrieved on-campus room.',
                OnCampusRoom::findOfFail($room->id)
            );
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified on-campus room doesn\'t exist.'
            );
        }
    }

    /**
     * Update an off-campus room.
     *
     * @param \Illuminate\Http\Request  $request 
     * @param \App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function updateOffCampusRoom(
        UpdateOffCampusRoomRequest $request, OffCampusRoom $room
    ) {
        return $request->updateRoom($room);
    }

    /**
     * Update an on-campus room.
     *
     * @param \Illuminate\Http\Request  $request 
     * @param \App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function updateOnCampusRoom(
        UpdateOnCampusRoomRequest $request, OnCampusRoom $room
    ) {
        return $request->updateRoom($room);
    }

    /**
     * Delete the specified off-campus room.
     *
     * @param App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyOffCampusRoom(OffCampusRoom $room)
    {
        try {
            OffCampus::findOrFail($room->id)->delete();
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified off-campus room doesn\'t exist.'
            );
        }
    }

    /**
     * Delete the specified off-campus room.
     *
     * @param App\Models\OffCampusRoom $room 
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroyOnCampusRoom(OnCampusRoom $room)
    {
        try {
            OnCampus::findOrFail($room->id)->delete();
        } catch (ModelNotFoundException $ex) {
            return failedJsonResponse(
                'The specified on-campus room doesn\'t exist.'
            );
        }
    }
}
