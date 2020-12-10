<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users_role';

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
        "role_name",
        "role_permission",
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

}
