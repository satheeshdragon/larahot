<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/* Services */

use App\Services\Users\UserspermissionService;

/* Repository */

use App\Repositories\Users\UserspermissionRepositories;

class UserpermissionController extends Controller
{
    /**
     * @var UserspermissionService
     */
    private $UsersService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UserspermissionService      = new UserspermissionService();
        $this->UserspermissionRepositories = new UserspermissionRepositories();
    }

    /**
     * USER ROLE INDEX SCREEN.
     *
     */
    public function index()
    {
        $users['permission'] = $this->UserspermissionService->getUserPermissionList();
        $users['no']    = 0;
        return view('users/usersPermission/userPermissionDisplay')->with($users);
    }

    /**
     * USER ROLE ADD SCREEN
     *
     */
    public function userPermissionAdd()
    {
        $usersPermission['userpermissionmodule'] = collect($this->UserspermissionRepositories->getUserPermissionModuleList())->toArray();
        return view('users/usersPermission/userPermissionStore')->with($usersPermission);
    }

    /**
     * USER ROLE ADD STORE
     *
     */
    public function userPermissionStore(request $request)
    {
        $this->UserspermissionService->storeUserPermission($request);
        return redirect('usermanage/userpermission')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER ROLE EDIT SCREEN
     *
     */
    public function userPermissionEdit($masterId)
    {
        $usersPermission['permission']       = $this->UserspermissionService->getUserPermissionEditDetails($masterId);
        $usersPermission['permission_module']       = $usersPermission['permission']['module_id'];
        $usersPermission['userpermissionmodule'] = collect($this->UserspermissionRepositories->getUserPermissionModuleList())->toArray();
        return view('users/usersPermission/userPermissionUpdate')->with($usersPermission);
    }

    /**
     * USER ROLE UPDATE PROCESS
     *
     */
    public function userPermissionupdate(request $request)
    {
        $usersPermission['permission'] = $this->UserspermissionService->updateUserPermissionDetails($request);
        return redirect('usermanage/userpermission')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER ROLE VIEW SCREEN
     *
     */
    public function userPermissionView($masterId)
    {
        $usersPermission['permission']       = $this->UserspermissionService->getUserPermissionEditDetails($masterId);
        $usersPermission['permission_module']       = $usersPermission['permission']['module_id'];
        $usersPermission['userpermissionmodule'] = collect($this->UserspermissionRepositories->getUserPermissionModuleList())->toArray();
        return view('users/usersPermission/userPermissionView')->with($usersPermission);
    }

    /**
     * USER ROLE DELETE PROCESS
     *
     */
    public function userPermissiondestroy(request $request)
    {
        $usersRole['userrole'] = $this->UserspermissionService->DestroyUserPermissionDetails($request);
        return redirect('usermanage/userpermission')->with(['success' => 'Registered Succesfully']);
    }
}
