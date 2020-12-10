<?php

namespace App\Repositories\Users;


/* Models */

use App\Models\Users\UserPermission;
use App\Models\Users\UserPermissionModule;
use Illuminate\Support\Facades\Log;

class UserspermissionRepositories
{
    /* ===============================CREATE=============================== */

    /* Get Event Details */
    public function storeUserPermission($userPermissionDetails)
    {

        $userPermissionDetailsResult = UserPermission::create($userPermissionDetails);
        Log::error('userPermissionDetailsResult has Inserted :' . $userPermissionDetailsResult->id);
        return $userPermissionDetailsResult->id;
    }

    /* ===============================CREATE-END=========================== */

    /* ===============================READ================================= */

    /* Get Permission Details */
    public function getUserPermissionList()
    {
        return UserPermission::all();
    }

    /* Get Permission Modules Details */
    public function getUserPermissionModuleList()
    {
        return UserPermissionModule::all();
    }

    /* Get Specific User Permission Details */
    public function getSpecificUserPermissionDetails($eventId)
    {
        return UserPermission::whereId($eventId)->first();
    }

    /* ===============================READ-END============================ */

    /* ===============================UPDATE=============================== */

    /* Get Specific Event Details */
    public function updateUserPermission($masterId, $userPermissionDetails)
    {
        return UserPermission::whereId($masterId)->update($userPermissionDetails);
    }

    /* ===============================UPDATE-END========================== */

    /* ===============================DELETE=============================== */

    /* Get Specific Event Details */
    public function destroyUserPermission($masterId)
    {
        return UserPermission::whereId($masterId)->delete();
    }

    /* ===============================DELETE-END========================== */


    /* ===============================FORMATTING========================== */

    /* ===============================FORMATTING-END====================== */
}
