<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Users\UsersroleService;
use Illuminate\Http\Request;

/* Services */

use App\Services\Users\UsersService;

class UserController extends Controller
{
    /**
     * @var UsersService
     */
    private $UsersService;
    /**
     * @var UsersroleService
     */
    private $UsersroleService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->UsersroleService = new UsersroleService();
        $this->UsersService     = new UsersService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users['users'] = $this->UsersService->getUserList();
        $users['no']    = 0;
        return view('users/users/userDisplay')->with($users);
    }

    /**
     * USER ADD SCREEN.
     *
     */
    public function userAdd()
    {
        $users['users'] = $this->UsersroleService->getUserRoleList();
        return view('users/users/userStore')->with($users);
    }

    /**
     * USER ROLE ADD STORE
     *
     */
    public function userStore(request $request)
    {
        $this->UsersService->storeUserDetails($request);
        return redirect('usermanage/user')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER EDIT SCREEN
     *
     */
    public function userEdit($masterId)
    {
        $users['user'] = $this->UsersService->getUserSpecificDetails($masterId);
        $users['users_roles'] = $this->UsersroleService->getUserRoleList();
        return view('users/users/userUpdate')->with($users);
    }

    /**
     * USER UPDATE PROCESS
     *
     */
    public function userUpdate(request $request)
    {
        $usersRole['users'] = $this->UsersService->UpdateDetails($request);
        return redirect('usermanage/user')->with(['success' => 'Registered Succesfully']);
    }

    /**
     * USER VIEW SCREEN
     *
     */
    public function userView($masterId)
    {
        $users['user'] = $this->UsersService->getUserSpecificDetails($masterId);
        $users['users_roles'] = $this->UsersroleService->getUserRoleList();
        return view('users/users/userView')->with($users);
    }

    /**
     * USER ROLE DELETE PROCESS
     *
     */
    public function userDestroy(request $request)
    {
        $users['user'] = $this->UsersService->destroyUserDetails($request);
        return redirect('usermanage/user')->with(['success' => 'Deleted Succesfully']);
    }
}
