<?php

namespace App\Models\Users;

use App\Models\Users\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserMember extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'user_name',
        'phone',
        'address',
        'role_id',
        'password',
    ];

    /**
     * The Default TimeStamp.
     *
     * @var array
     */
    public $timestamps = true;

    /**
     * The Created By Assigned as Current TimeStamp & UPDATED_AT Assigned as Current TimeStamp.
     *
     * @var array
     */
    // const CREATED_AT = 'created';
    // const UPDATED_AT = 'updated';

    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'id', 'role_id');
    }
}
