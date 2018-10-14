<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
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
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
