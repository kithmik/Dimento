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

Route::post('/MobileAPI/register', 'MobileAPIController@register');
Route::post('/MobileAPI/login', 'MobileAPIController@login');

Route::get('/MobileAPI/get_models', 'MobileAPIController@getObjects');

Route::post('/MobileAPI/set_forum_posts', 'MobileAPIController@storeForumPost');
Route::get('/MobileAPI/get_forum_posts', 'MobileAPIController@getForumPosts');
Route::get('/MobileAPI/get_forum_posts/{category}', 'MobileAPIController@getPosts');
Route::get('/MobileAPI/show_forum_post/{id}', 'MobileAPIController@showForumPost');

/*User Profile*/

Auth::routes();

Route::get('/confirm/{code}', 'HomeController@confirm');

Route::get('/social/handle/{provider}', 'Auth\SocialController@handle');
Route::get('/social/callback/{provider}', 'Auth\SocialController@callback');

Route::get('/home', 'HomeController@index')->name('home');



/*Search*/

Route::get('/search/{keyword}', 'SearchController@find');
Route::get('/object/explore/{category}', 'SearchController@objCategories');

/*Admin Routes*/

Route::post('/admin/make_admin', 'AdminController@makeAdmin');

Route::resource('/admin', 'AdminController');


Route::resource('/user', 'User\ProfileController');

Route::post('/user/follow', 'User\ProfileController@follow');

Route::get('/notifications', 'User\ProfileController@getNotifications');


/*3D Model Object*/
Route::resource('/object', 'Object\ObjectController');

Route::resource('/comment', 'Object\CommentController');

//Route::resource('/rating', 'Object\RatingController');

Route::post('/report/object', 'Object\ObjectController@report');

Route::group(['prefix' => '/reaction/{id}'], function () {
    Route::get('like/{state?}', 'Object\RatingController@like');
    Route::get('rate/{rating?}', 'Object\RatingController@rate');
});

Route::get('/comment/{id}/delete','Object\CommentController@deleteComment');
Route::post('/comment/{id}','Object\CommentController@setComment');


/*Forum*/

Route::get('/forum', 'Forum\PostController@getCategories');

Route::get('/forum/post/{category}', 'Forum\PostController@getPosts');

Route::resource('/post', 'Forum\PostController');

Route::resource('/reply', 'Forum\ReplyController');

/*Task*/

Route::resource('/task', 'Task\TaskController');

Route::get('/bid/create/{id}', 'Task\BidsController@create');
Route::resource('/bid', 'Task\BidsController');


/*Messages*/

Route::get('/message/to/{id}', 'Message\MessageController@index');

Route::get('/messages/request/{id}', 'Message\MessageController@getMessages');

Route::get('/messages/request_updates/{id}', 'Message\MessageController@getUpdates');

Route::resource('/message', 'Message\MessageController');


/*Advertisement*/

Route::resource('/advertisement', 'Advertiesement\AdvertiesementController');

