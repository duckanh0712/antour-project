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
    return view('welcome');
});
Route::get('/admin', 'AdminController@index')->name('dashboard');
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('employee', 'EmployeeController');
});