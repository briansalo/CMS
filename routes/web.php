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

Route::middleware(['auth'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('posts','PostsController');
	

	Route::get('user_profile/{id}', 'UsersController@show')->name('user_profile');
	Route::get('change_profile', 'UsersController@edit')->name('change_profile');
	Route::post('user_update', 'UsersController@update');
	Route::get('list_user', 'UsersController@list_user')->name('list_user');
	Route::get('add_friend/{id}', 'UsersController@add_friend');
	Route::get('cancel_friend_request/{id}', 'UsersController@cancel_friend_request');
	Route::get('unfriend/{id}', 'UsersController@unfriend');
	Route::get('list_friend', 'UsersController@list_friend')->name('list_friend');
	Route::get('list_request', 'UsersController@list_request')->name('list_request');
	Route::get('accept_request/{id}', 'UsersController@accept_request');


});

		//ang verifyadmin mao nay middleware nga g register nimo sa kernel.php. then sa folder nga middleware tapos VerifyAdmin dedto naka state nga if ang authentication user is not admin then dili siya ka sulod ane nga route
Route::middleware(['auth', 'VerifyAdmin'])->group(function () {

	Route::get('all_posts123', 'PostsController@fb_clone')->name('fb_clone');
	Route::get('all_posts1234', 'PostsController@bootstrap')->name('bootstrap');
	Route::get('all_posts123456', 'PostsController@profile')->name('profile');
	Route::get('all_posts1234567', 'PostsController@list_user')->name('list-of-user');

	Route::get('all_posts', 'PostsController@index_admin')->name('index_admin');
	
	Route::get('/users', 'UsersController@index');
	Route::post('users/{id}/make_admin', 'UsersController@make_admin');
	Route::post('users/{id}/make_user', 'UsersController@make_user');

	Route::resource('categories','CategoriesController');

	Route::resource('tags','TagsController');

	Route::get('trashed_posts','PostsController@trashed')->name('trashed_post');
	Route::get('restore_posts/{id}','PostsController@restore');

});