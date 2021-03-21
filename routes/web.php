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

use AdvanceSearch\AdvanceSearchProvider\Search;

Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckAuth');
Route::get('/', 'ClientController@index')->name('client.home');
Route::get('/user/profile', 'ClientController@profile')->name('client.profile');
Route::post('/user/update/{id}', 'UserController@update')->name('client.profile.update')->middleware('CheckLogin');
Route::post('/user/password', 'AdminController@changePassword')->name('change.password')->middleware('CheckLogin');
Route::get('/employee/password', 'EmployeeController@changePasswordForm')->name('admin.change.password.form')->middleware('CheckAuth');
Route::post('/employee/password', 'EmployeeController@changePassword')->name('admin.change.password')->middleware('CheckAuth');
Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckAuth');
Route::get('/login', 'AdminController@login')->name('admin.login');
Route::post('/admin', 'AdminController@postLogin')->name('admin.postLogin');
Route::get('/register', 'ClientController@registerForm')->name('register');
Route::post('/register', 'UserController@store')->name('post.register');
Route::get('/logout', 'AdminController@logout')->name('logout');
Route::get('employee/show', 'EmployeeController@detail')->name('employee.detail')->middleware('CheckAuth');
Route::get('/tour/detail/{id}', 'ClientController@detail')->name('client.tour.detail')->middleware('CheckLogin');
Route::post('book-tour/approve', 'BookTourController@approve')->name('book-tour.approve')->middleware('CheckAuth');
Route::get('/book-tour/pay/{id}', 'BookTourController@paymentForm')->name('book-tour.pay.form')->middleware('CheckAuth');
Route::post('/book-tour/pay/{id}', 'BookTourController@payment')->name('book-tour.pay')->middleware('CheckAuth');
Route::get('/book-tour/statistics', 'BookTourController@statistics')->name('book-tour.statistics')->middleware('CheckLogin');
Route::post('/book-tour/statistics/filter', 'BookTourController@filterDate')->name('book-tour.statistics.filter')->middleware('CheckLogin');
Route::get('/search', 'SearchController@searchTours')->name('search.tours')->middleware('CheckLogin');
Route::group(['prefix' => 'admin', 'as' => 'admin.',  'middleware' => 'CheckAuth' ], function () {
    Route::resource('employee', 'EmployeeController');
    Route::post('employee/{id}', 'EmployeeController@change')->name('employee.change');
    Route::post('user/{id}', 'UserController@change')->name('user.change');
    Route::resource('/tour', 'TourController');
    Route::resource('/user', 'UserController');
    Route::resource('/book-tour', 'BookTourController');

});


Route::get('/abc', 'TourController@search');
Route::get('testngaygio/', function () {
    $a = new DateTime('2021/03/20');
    $now = new DateTime('tomorrow');
    dd($now);
    if ($a > $now){
        dd(false);
    }else{
        dd(true);
    }
});
