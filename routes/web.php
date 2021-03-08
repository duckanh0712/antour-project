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

Route::get('/', 'ClientController@index')->name('client.home');
Route::get('/user/profile', 'ClientController@profile')->name('client.profile');
Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckAuth');
Route::get('/login', 'AdminController@login')->name('admin.login');
Route::post('/admin', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/register', 'ClientController@registerForm')->name('register');
Route::post('/register', 'UserController@store')->name('post.register');
Route::get('/logout', 'AdminController@logout')->name('logout');

Route::get('employee/show', 'EmployeeController@detail')->name('employee.detail')->middleware('CheckAuth');
Route::get('/tour/detail/{id}', 'ClientController@detail')->name('client.tour.detail')->middleware('CheckRole');
Route::post('/user/update', 'ClientController@update')->name('user.update')->middleware('CheckRole');
Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => 'CheckAuth' ], function () {
    Route::resource('employee', 'EmployeeController');
    Route::post('employee/{id}', 'EmployeeController@change')->name('employee.change');
    Route::post('user/{id}', 'UserController@change')->name('user.change');
    Route::resource('/tour', 'TourController');
    Route::resource('/user', 'UserController');
    Route::resource('/book-tour', 'BookTourController');

});



