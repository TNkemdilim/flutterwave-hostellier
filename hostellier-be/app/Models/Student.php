<?php

namespace App\Models;

use Illuminate\Validation\Rule;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Notifiable;

    /**
     * Validation rules for a student during create.
     * 
     * @return Array
     */
    public static function getValidationRulesForCreate()
    {
        return [
            'firstname' => 'required|string|min:2',
            'lastname' => 'required|string|min:2',
            'level' => ['sometimes', 'required', Rule::in([1, 2, 3, 4, 5])],
        ];
    }

    /**
     * Validation rules for a student during update.
     * 
     * @return Array
     */
    public static function getValidationRulesForUpdate()
    {
        return [
            'firstname' => 'sometimes|required|string|min:2',
            'lastname' => 'sometimes|required|string|min:2',
            'level' => ['sometimes', 'required', Rule::in([1, 2, 3, 4, 5])],
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'level', 'user_id'
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
     * Get basic details of a student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function basicDetails()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get lla bookings of a student.
     * 
     * @return \Illuminate\Database\Eloquent\Relations
     */
    public function allBookings()
    {
        return $this->offCampusBookings()
            ->get()
            ->onCampusBookings()
            ->get(); 
    }

    /**
     * Get all off-campus rooms purchased by student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offCampusBookings()
    {
        return $this->hasMany('App\Models\OffCampusBookings');
    }

    /**
     * Get all on-campus rooms purchased by student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function onCampusBookings()
    {
        return $this->hasMany('App\Models\OnCampusBookings');
    }
}
