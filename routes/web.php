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

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Response;
use App\User;

Route::get('/', function () {
    return view('welcome');
})->name('root');


Route::get('redirectToProvider','UserController@redirectToProvider')->name('redirectToProvider');
Route::get('handleProviderCallback','UserController@handleProviderCallback')->name('handleProviderCallback');
Route::get('redirect','UserController@redirect')->name('redirect');
Route::get('callback','UserController@callback')->name('callback');
Route::post('logout','UserController@logout')->name('logout');
Route::get('home','UserController@home')->name('home');
Route::get('signUp','UserController@create')->name('signUp');
Route::get('login','UserController@login')->name('login');
Route::post('signin','UserController@signin')->name('signin');
Route::post('signin1','UserController@signin1')->name('signin1');
Route::post('changePass','UserController@changePass')->name('changePass');
Route::get('profile','UserController@profile')->name('profile');
Route::resource('users','UserController');





Route::resource('admins','AdminController');