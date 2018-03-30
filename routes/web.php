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


Route::get('/webHome', function () {
    return View::make('Web.webHome');
})->name('webHome');
Route::get('redirectToProvider', 'UserController@redirectToProvider')->name('redirectToProvider');
Route::get('handleProviderCallback', 'UserController@handleProviderCallback')->name('handleProviderCallback');
Route::get('redirect', 'UserController@redirect')->name('redirect');
Route::get('callback', 'UserController@callback')->name('callback');
Route::post('logout', 'UserController@logout')->name('logout');
Route::get('home', 'UserController@home')->name('home');
Route::get('signUp', 'UserController@create')->name('signUp');
Route::get('login', 'UserController@login')->name('login');
Route::post('signin', 'UserController@signin')->name('signin');
Route::post('signin1', 'UserController@signin1')->name('signin1');
Route::post('changePass', 'UserController@changePass')->name('changePass');
Route::get('profile', 'UserController@profile')->name('profile');
Route::resource('users', 'UserController');



Route::get('profile1', 'AdminController@profile')->name('profile1');
Route::get('admins', 'AdminController@index')->name('admins');
Route::get('signUp1', 'AdminController@create')->name('signUp1');
Route::resource('admins', 'AdminController');


Route::get('showComment/{id}', 'BlogController@showComment')->name('showComment');

Route::get('test', function()
{
    Mail::send('Email.test', [], function ($message)
    {
        $message->to('example@gmail.com', 'HisName')->subject('Welcome!');
    });
});
Route::put('blogs/{blog}/comments/{comment}', function ($blogId, $commentId) {
});
Route::post('comments1/{id}', 'CommentController@comment')->name('comment1');
Route::post('comments/{id}', 'CommentController@delete')->name('commentDelete');
Route::put('store', 'CommentController@store')->name('store');
Route::get('create', 'CommentController@create')->name('comment');
Route::get('comments/{id}', 'CommentController@show')->name('toggleComment');
Route::get('comments1/{id}', 'CommentController@show1')->name('toggleComment1');
Route::get('comments/{id}/edit', 'CommentController@edit')->name('commentEdit');
Route::resource('comments', 'CommentController');
Route::post('/like','EmotionController@postLikePost')->name('like');

Route::post('toggle/{id}', 'EmotionController@toggle')->name('toggleEmotion');

Route::resource('emotions', 'EmotionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('blogs/{id}/comments1', 'CommentController@comment')->name('comment2');




Route::post('blogs/{id}/editTitleBlog', 'BlogController@editTitleBlog')->name('editTitleBlog');
Route::post('blogs/{id}/editContentBlog', 'BlogController@editContentBlog')->name('editContentBlog');

Route::resource('blogs', 'BlogController');
