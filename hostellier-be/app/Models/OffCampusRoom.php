<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class OffCampusRoom extends Model
{
    use Notifiable;

    /**
     * Validation rules for an off-campus during create.
     * 
     * @return Array
     */
    public static function getValidationRulesForCreate()
    {
        return [
            'title' => 'required|string|min:3',
            'city' => 'required|string|min:3',
            'state' => 'required|string|min:3',
            'country' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'price' => 'required|numeric|min:0',
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
