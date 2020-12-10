<?php

namespace App\Services\Users;

use App\Helpers\Helper;

use App\Models\Users\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;


/* Repository */
use App\Repositories\Users\UsersroleRepositories;

class UsersroleService
{
    public function __construct()
    {
        $this->UsersroleRepositories = new UsersroleRepositories();
    }

    # =============================================
    # =       ALL DETAILS                         =
    # =============================================

    public function getUserRoleList()
    {
        try {
            $userRoleList = collect($this->UsersroleRepositories->getUserRoleList())->toArray();
            $userRoleListRowDetails = [];
            foreach ($userRoleList as $roleListvalue){
                $rolepermissionList = explode(',',$roleListvalue['role_permission']);
                $listOfPermissionName = [];
                foreach ($rolepermissionList as $rolePermissionValue){
                    $userPermissionname = UserPermission::whereId($rolePermissionValue)->first();
                    array_push($listOfPermissionName,$userPermissionname->permission_name);
                }
                $userRoleListDetails['role_id'] = $roleListvalue['id'];
                $userRoleListDetails['role_name'] = $roleListvalue['role_name'];
                $userRoleListDetails['role_permission'] = $listOfPermissionName;
                array_push($userRoleListRowDetails,$userRoleListDetails);
            }
            return $userRoleListRowDetails;
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =                 Add Details               =
    # =============================================

    public function storeUserRole($request)
    {
        try {
            $rolePermissionDetails = $request->all();
            $userRoleDetail['role_name'] = $rolePermissionDetails['role']['role_name'];
            $userRoleDetail['role_permission'] = implode(',',$rolePermissionDetails['role']['role_permission']);
            return $this->UsersroleRepositories->storeUserRoleDetails($userRoleDetail);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =           Edit Details                    =
    # =============================================

    public function getUserRoleEditDetails($masterId)
    {
        try {
            return $this->UsersroleRepositories->getSpecificUserRoleDetails($masterId);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =                  Update                  =
    # =============================================

    public function UpdateUserroleDetails(request $request)
    {
        $updateUserRoleUpdateDetails = $request->all();
//        dd($updateUserRoleUpdateDetails);
        try {
            $rolePermissionDetails = $request->all();
            $masterId = $rolePermissionDetails['master_id'];
            $userRoleDetail['role_name'] = $rolePermissionDetails['role']['role_name'];
            $userRoleDetail['role_permission'] = implode(',',$rolePermissionDetails['role']['role_permission']);
            return $this->UsersroleRepositories->updateUserRole($masterId,$userRoleDetail);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =             Destroy                       =
    # =============================================

    public function DestroyUserRoleDetails(request $request)
    {
        $postDetails = $request->all();
        try {
            return $this->UsersroleRepositories->destroyUserRole($postDetails['masterid']);
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
