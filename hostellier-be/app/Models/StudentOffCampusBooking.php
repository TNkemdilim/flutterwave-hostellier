<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class StudentOffCampusBooking extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
        'off_campus_room_id',
        'expiring_at',
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
    public function students()
    {
        $this->belongsToOne('App\Models\Student', 'student_id');
    }

    /**
     * Get the room details of the current booking.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roomDetails()
    {
        $this->belongsToOne('App\Models\OffCampusRoom', 'off_campus_room_id');
    }
}
