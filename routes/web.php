<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'usermanage'], function () {

    /* USER MANGEMENT */
    Route::get('/user', 'User\UserController@index')->name('user');

    /* User ADD */
    Route::get('/useradd', 'User\UserController@userAdd')->name('useradd');
    Route::post('/userstore', 'User\UserController@userStore')->name('userstore');

    /* User Role EDIT */
    Route::get('/userupdate/{id}', 'User\UserController@userEdit')->name('userupdate');
    Route::post('/userupdation', 'User\UserController@userUpdate')->name('userupdation');

    /* User Role VIEW */
    Route::get('/userview/{id}', 'User\UserController@userView')->name('userview');

    /* user DELETE */
    Route::post('/userdestroy', 'User\UserController@userDestroy')->name('userdestroy');

    /* ----------------------------------------------------------------------------------------------------------------  */

    /* User Role */
    Route::get('/userrole', 'User\UserroleController@index')->name('userrole');

    /* User Role ADD */
    Route::get('/userroleadd', 'User\UserroleController@userRoleAdd')->name('userroleadd');
    Route::post('/userrolestore', 'User\UserroleController@userRoleStore')->name('userrolestore');

    /* User Role EDIT */
    Route::get('/userroleupdate/{id}', 'User\UserroleController@userRoleEdit')->name('userroleupdate');
    Route::post('/userroleupdation', 'User\UserroleController@userRoleupdate')->name('userroleupdation');

    /* User Role VIEW */
    Route::get('/userroleview/{id}', 'User\UserroleController@userRoleView')->name('userroleview');

    /* user Role DELETE */
    Route::post('/userroledestroy', 'User\UserroleController@userRoledestroy')->name('userroledestroy');

    /* ----------------------------------------------------------------------------------------------------------------  */

    /* User Permission */
    Route::get('/userpermission', 'User\UserpermissionController@index')->name('userpermission');

    /* User Role ADD */
    Route::get('/userpermissionadd', 'User\UserpermissionController@userPermissionAdd')->name('userpermissionadd');
    Route::post('/userpermissionstore', 'User\UserpermissionController@userPermissionStore')->name('userpermissionstore');

    /* User Role EDIT */
    Route::get('/userpermissionupdate/{id}', 'User\UserpermissionController@userPermissionEdit')->name('userpermissionupdate');
    Route::post('/userpermissionupdation', 'User\UserpermissionController@userPermissionupdate')->name('userpermissionupdation');

    /* User Role VIEW */
    Route::get('/userpermissionview/{id}', 'User\UserpermissionController@userPermissionView')->name('userpermissionview');

    /* user Role DELETE */
    Route::post('/userpermissiondestroy', 'User\UserpermissionController@userPermissiondestroy')->name('userpermissiondestroy');

    /* ----------------------------------------------------------------------------------------------------------------  */


    /* Pagination testing */
    Route::get('/employee', 'EmployeeController@index')->name('employee');



});
