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

/*API calls for Mobile App*/
Route::get('/get_csrf', 'MobileAPIController@getCSRF');

Route::post('/MobileAPI/register', 'Auth\RegisterController@register');
Route::post('/MobileAPI/login', 'Auth\LoginController@login');

Route::get('/MobileAPI/get_models', 'MobileAPIController@getObjects');

Route::get('/MobileAPI/get_forum_posts', 'MobileAPIController@getForumPosts');
Route::get('/MobileAPI/show_forum_post/{id}', 'MobileAPIController@showForumPost');

/*User Profile*/

Auth::routes();

Route::get('/confirm/{code}', 'HomeController@confirm');

Route::get('/social/handle/{provider}', 'SocialController@handle');
Route::get('/social/callback/{provider}', 'SocialController@callback');

Route::get('/home', 'HomeController@index')->name('home');


/*Admin Routes*/
Route::resource('/admin', 'AdminController');


//Route::resource('/profile', 'User/ProfileController');

/*3D Model Object*/
Route::resource('/object', 'Object\ObjectController');

Route::resource('/comment', 'Object\CommentController');

Route::resource('/rating', 'Object\RatingController');

/*Forum*/

Route::get('/forum', 'Forum\PostController@getCategories');

Route::get('forum/post/{category}', 'Forum\PostController@getPosts');

Route::resource('/post', 'Forum\PostController');

Route::resource('/reply', 'Forum\ReplyController');

/*Task*/

Route::resource('/task', 'Task\TaskController');

Route::resource('/bid', 'Task\BidsController');


/*Messages*/


Route::resource('/message', 'Message\MessageController');


