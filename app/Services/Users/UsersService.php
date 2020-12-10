<?php

namespace App\Services\Users;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;


/* Repository */
use App\Repositories\Users\UsersRepositories;

class UsersService
{
    public function __construct()
    {
        $this->UsersRepositories = new UsersRepositories();
    }

    # =============================================
    # =              GET Details                  =
    # =============================================

    public function getUserList()
    {
        try {
            return $this->UsersRepositories->getUserList();
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =       Users Add Details                   =
    # =============================================

    public function storeUserDetails(Request $request)
    {
        try {
            $userDetails = $request->all();
            $userDetails['user']['password'] = Hash::make($userDetails['user']['password']);
            return $this->UsersRepositories->storeUser($userDetails['user']);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =           Edit Details                    =
    # =============================================

    public function getUserSpecificDetails($masterId)
    {
        try {
            return $this->UsersRepositories->getSpecificUserDetails($masterId);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =                  Update                  =
    # =============================================

    public function UpdateDetails(request $request)
    {
        try {
            $users = $request->all();
            $masterId = $users['master_id'];
            return $this->UsersRepositories->updateUsers($masterId,$users['user']);
        } catch (Exception $e) {
            return $this->doErrorFormat($e);
        }
    }

    # =============================================
    # =             Destroy                       =
    # =============================================

    public function destroyUserDetails(request $request)
    {
        $postDetails = $request->all();
        try {
            return $this->UsersRepositories->destroyUser($postDetails['masterid']);
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
