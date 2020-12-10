<?php

namespace App\Repositories\Users;


/* Models */

use App\Models\Users\UserMember;
use Illuminate\Support\Facades\Log;

class UsersRepositories
{
    /* ===============================CREATE=============================== */

    /* Get Event Details */
    public function storeUser($userDetails)
    {
        $UserResult = UserMember::create($userDetails);
        Log::error('User has Inserted :' . $UserResult->id);
        return $UserResult->id;
    }

    /* ===============================CREATE-END=========================== */

    /* ===============================READ================================= */

    /* Get Event Details */
    public function getUserList()
    {
        return UserMember::with('userRole')->get();
    }

    /* Get Specific Event Details */
    public function getSpecificUserDetails($masterId)
    {
        return UserMember::whereId($masterId)->first();
    }

    /* ===============================READ-END============================ */

    /* ===============================UPDATE=============================== */

    /* Get Specific Event Details */
    public function updateUsers($masterId, $userDetails)
    {
        return UserMember::whereId($masterId)->update($userDetails);
    }

    /* ===============================UPDATE-END========================== */

    /* ===============================DELETE=============================== */

    /* Get Specific Event Details */
    public function destroyUser($masterId)
    {
            UserMember::whereId($masterId)->delete();
    }

    /* ===============================DELETE-END========================== */


    /* ===============================FORMATTING========================== */

    /* ===============================FORMATTING-END====================== */
}
