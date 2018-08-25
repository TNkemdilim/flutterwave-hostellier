<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class OnCampusRoom extends Model
{
    use Notifiable;

    /**
     * Validation rules for an on-campus during create.
     * 
     * @return Array
     */
    public static function getValidationRulesForCreate()
    {
        return [
            'title' => 'required|string|min:3',
            'hall_name' => 'required|string|min:3',
            'hall_location' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:0',
            'students_per_room' => 'required|numeric|min:1',
            'picture' => 'required|url',
            'booked' => 'sometimes|required|boolean',
        ];
    }

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
        'created_at', 'updated_at', 'pivot',
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
