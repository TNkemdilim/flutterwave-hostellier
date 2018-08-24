<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnCampusRoomAllowedCourses extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'on_campus_room_id', 'course_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'on_campus_room_id', 'course_id',
    ];
}
