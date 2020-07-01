<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('days', 'DayController');
    Route::resource('time', 'TimeController');
    Route::resource('designation', 'DesignationController');
    Route::resource('doctor', 'DoctorController');
    Route::resource('patient', 'PatientController');
    Route::resource('booking', 'BookingController');
    Route::get('get-designation', 'BookingController@getDesignation')->name('get-designation');
    Route::get('get-time', 'BookingController@getTime')->name('get-time');
    Route::get('get-day', 'BookingController@getDay')->name('get-day');
    Route::get('get-fee', 'BookingController@getFee')->name('get-fee');
    Route::post('bookingstatus/{id}', 'BookingController@bookingStatus')->name('status.update');
    Route::get('export', 'BookingController@export')->name('export');
    Route::get('generate-pdf/{id}', 'BookingController@generatePdf')->name('generate-pdf');


});

Route::get('/frontend', 'FrontendController@index')->name('frontend.index');
Route::get('/frontend-login', 'FrontendController@login')->name('frontend.login');
Route::get('/frontend-register', 'FrontendController@register')->name('frontend.register');
