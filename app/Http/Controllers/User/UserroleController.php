<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/* Services */

use App\Services\Users\UsersroleService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

/* Repository */

use App\Repositories\Users\UserspermissionRepositories;

class UserroleController extends Controller
{
    /**
     * @var UsersroleService
     */
    private $UsersService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UsersroleService            = new UsersroleService();
        $this->UserspermissionRepositories = new UserspermissionRepositories();
    }

    /**
     * USER ROLE INDEX SCREEN.
     *
     */
    public function index()
    {
        $users['users'] = $this->UsersroleService->getUserRoleList();
        $users['no']    = 0;
        return view('users/usersRole/userRoleDisplay')->with($users);
    }

    /**
     * USER ROLE ADD SCREEN
     *
     */
    public function userRoleAdd()
    {
        $usersRole['userpermission'] = $this->UserspermissionRepositories->getUserPermissionList();
        return view('users/usersRole/userRoleStore')->with($usersRole);
    }

    /**
     * USER ROLE ADD STORE
     *
     */
    public function userRoleStore(request $request)
    {
        $this->UsersroleService->storeUserRole($request);
        return redirect('usermanage/userrole')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER ROLE EDIT SCREEN
     *
     */
    public function userRoleEdit($masterId)
    {
        $usersRole['userrole'] = $this->UsersroleService->getUserRoleEditDetails($masterId);
        $usersRole['userpermission'] = $this->UserspermissionRepositories->getUserPermissionList();
        return view('users/usersRole/userRoleUpdate')->with($usersRole);
    }

    /**
     * USER ROLE UPDATE PROCESS
     *
     */
    public function userRoleupdate(request $request)
    {
        $usersRole['userrole'] = $this->UsersroleService->UpdateUserroleDetails($request);
        return redirect('usermanage/userrole')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER ROLE VIEW SCREEN
     *
     */
    public function userRoleView($masterId)
    {
        $usersRole['userrole'] = $this->UsersroleService->getUserRoleEditDetails($masterId);
        $usersRole['userpermission'] = $this->UserspermissionRepositories->getUserPermissionList();
        return view('users/usersRole/userRoleView')->with($usersRole);
    }

    /**
     * USER ROLE DELETE PROCESS
     *
     */
    public function userRoledestroy(request $request)
    {
        $usersRole['userrole'] = $this->UsersroleService->DestroyUserRoleDetails($request);
        return redirect('usermanage/userrole')->with(['success' => 'Deleted Succesfully']);
    }
}
