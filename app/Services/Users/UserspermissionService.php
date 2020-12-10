<?php

namespace App\Services\Users;

use App\Helpers\Helper;

use App\Models\Users\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;


/* Repository */

use App\Repositories\Users\UserspermissionRepositories;

class UserspermissionService
{
    public function __construct()
    {
        $this->UserspermissionRepositories = new UserspermissionRepositories();
    }

    # =============================================
    # =       ALL DETAILS                         =
    # =============================================

    public function getUserPermissionList()
    {
        try {
            $userPermissionList = collect($this->UserspermissionRepositories->getUserPermissionList())->toArray();
            return $userPermissionList;
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =                 Add Details               =
    # =============================================

    public function storeUserPermission($request)
    {
        try {
            $rolePermissionDetails                   = $request->all();
            $userPermissionDetail['permission_name'] = $rolePermissionDetails['permission']['permission_name'];
            $userPermissionDetail['module_id']       = implode(',', $rolePermissionDetails['permission']['module_id']);
            return $this->UserspermissionRepositories->storeUserPermission($userPermissionDetail);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =           Edit Details                    =
    # =============================================

    public function getUserPermissionEditDetails($masterId)
    {
        try {
            $userPermissionDetails                   = collect($this->UserspermissionRepositories->getSpecificUserPermissionDetails($masterId));
            $userPermissionDetail['id']              = $userPermissionDetails['id'];
            $userPermissionDetail['permission_name'] = $userPermissionDetails['permission_name'];
            $userPermissionDetail['module_id']       = explode(',', $userPermissionDetails['module_id']);
            return $userPermissionDetail;
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =                  Update                  =
    # =============================================

    public function updateUserPermissionDetails(request $request)
    {
//        $updateUserPermissionUpdateDetails = $request->all();
//        dd($updateUserPermissionUpdateDetails);
        try {
            $updateUserPermissionUpdateDetails             = $request->all();
            $masterId                          = $updateUserPermissionUpdateDetails['master_id'];
            $userPermissionDetail['permission_name'] = $updateUserPermissionUpdateDetails['permission']['permission_name'];
            $userPermissionDetail['module_id']       = implode(',', $updateUserPermissionUpdateDetails['permission']['module_id']);
            return $this->UserspermissionRepositories->updateUserPermission($masterId, $userPermissionDetail);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =             Destroy                       =
    # =============================================

    public function DestroyUserPermissionDetails(request $request)
    {
        $postDetails = $request->all();
        try {
            return $this->UserspermissionRepositories->destroyUserPermission($postDetails['masterid']);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    public function doErrorFormat($responseResult)
    {
        Log::error($responseResult->getMessage());
        $result['status']  = false;
        $result['message'] = $responseResult->getMessage();
        return $result;
    }
}
