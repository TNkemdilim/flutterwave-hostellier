<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class OffCampusRoom extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 
        'city', 
        'state', 
        'country', 
        'description',
        'price', 
        'picture',
        'booked', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * Get student who owns the current room.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studentOwner()
    {
        $this->hasOne(
            'App\Models\Student',
            'App\Models\StudentOffCampusBooking',
            'off_campus_room_id',
            'student_id'
        );
    }
}
