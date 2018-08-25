<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Utilities\Constants\UserEnum;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * Validation rules for a user during create.
     * 
     * @return Array
     */
    public static function getValidationRulesForCreate()
    {
        return [
            'email' => 'required|string|min:2',
            'password' => 'required|string|min:8',
            'c_password' => 'required|string|same:password',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'user_type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'user_type_id', 'password',
    ];

    /**
     * Returns the account type of a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountType()
    {
        return $this->belongsTo('App\Models\UserType', 'user_type_id');
    }

    /**
     * Checks if a user a student.
     *
     * @return bool
     */
    public function isStudent()
    {
        return strtolower($this->accountType()->first()->name) == UserEnum::STUDENT;
    }

    /**
     * Returns details of a student (such a user must truely be a student).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne|string
     */
    public function student()
    {
        if (!$this->isStudent()) {
            // Replace this with a throwing of custom exception.
            // return response()->json(
            //     [
            //         'status' => false,
            //         'message' => 'User is not a student'
            //     ]
            // );
            return null;
        }

        return $this->hasOne('App\Models\Student');
    }
}
