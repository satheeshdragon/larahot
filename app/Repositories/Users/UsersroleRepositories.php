<?php

namespace App\Repositories\Users;

/* Models */
use App\Models\Users\UserRole;
use Illuminate\Support\Facades\Log;

class UsersroleRepositories
{
    /* ===============================CREATE=============================== */

    /* Get Create Details */
    public function storeUserRoleDetails($userRoleDetails)
    {
        $userRoleResult = UserRole::create($userRoleDetails);
        Log::error('UserRole has Inserted :' . $userRoleResult->id);
        return $userRoleResult->id;
    }

    /* ===============================CREATE-END=========================== */

    /* ===============================READ================================= */

    /* Get UserRole Details */
    public function getUserRoleList()
    {
        return UserRole::all();
    }

    /* Get Specific UserRole Details */
    public function getSpecificUserRoleDetails($masterId)
    {
        return UserRole::whereId($masterId)->first();
    }

    /* ===============================READ-END============================ */

    /* ===============================UPDATE=============================== */

    /* Get Specific UserRole Details */
    public function updateUserRole($masterId, $userRoleDetails)
    {
        return UserRole::whereId($masterId)->update($userRoleDetails);
    }

    /* ===============================UPDATE-END========================== */

    /* ===============================DELETE=============================== */

    /* Get Specific User Role Details */
    public function destroyUserRole($masterId)
    {
        return UserRole::whereId($masterId)->delete();
    }

    /* ===============================DELETE-END========================== */


    /* ===============================FORMATTING========================== */

    /* ===============================FORMATTING-END====================== */
}
