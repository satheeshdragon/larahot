<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employee = Employee::orderBy('employee.id', 'DESC');
        $employee = $employee->leftJoin('users', 'users.id', '=', 'employee.id');
        $employee = $employee->paginate(10);


//        dump($employee);
//        dump($employee);
//        die();
        $result['employee'] = $employee;
        /* Home Page View */
        return view('employee')->with($result);
    }
}
