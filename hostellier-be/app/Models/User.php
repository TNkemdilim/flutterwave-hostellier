<?php
namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Utilities\Constants\UserEnum;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
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
     * Returns the account type of a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function accountType()
    {
        return $this->belongsTo('App\Models\UserEnum');
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
        if ($this->isStudent()) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'User is not a student'
                ]
            );
        }

        return $this->hasOne('App\Models\Student');
    }
}
