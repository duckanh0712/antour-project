<?php

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
    return view('client.users.login');
});
Route::get('/admin', 'AdminController@index')->name('dashboard');
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin', 'AdminController@postLogin')->name('admin.postLogin');
Route::group(['prefix' => 'admin', 'as' => 'admin.', ], function () {
    Route::resource('employee', 'EmployeeController');
    Route::post('employee/{id}', 'EmployeeController@change')->name('employee.change');
    Route::post('user/{id}', 'UserController@change')->name('user.change');


});
Route::resource('/user', 'UserController');

Route::get('/login', 'UserController@login')->name('user.login');
Route::post('/user/login', 'UserController@postLogin')->name('user.postLogin');


