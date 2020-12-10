<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee';

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
                'employee_first_name',
                'employee_last_name',
                'employee_ref_number',
                'employee_phone_number',
                'employee_address',
                'employee_address_two',
                'employee_country',
                'employee_state',
                'employee_city',
                'employee_email',
                'employee_pin_code',
                'employee_reference',
                'employee_unique_identy',
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
