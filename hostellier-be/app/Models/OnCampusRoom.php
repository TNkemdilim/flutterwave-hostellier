<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class OnCampusRoom extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'hall_name',
        'hall_location',
        'description',
        'price',
        'students_per_room',
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
     * Get all students assigned to the current room.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        $this->hasManyThrough(
            'App\Models\Student', 
            'App\Models\StudentOnCampusBooking',
            'on_campus_room_id',
            'student_id'
        );
    }
}
