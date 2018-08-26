<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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
     * Retrieves the available on-campus rooms available for 
     * students of this course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function onCampusRooms()
    {
        return $this->belongsToMany(
            'App\Models\OnCampusRoom',
            'on_campus_room_allowed_courses',
            'course_id',
            'on_campus_room_id'
        );
    }

    /**
     * Retrieves students offereing this course of study.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
