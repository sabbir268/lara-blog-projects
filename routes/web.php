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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog','AdminPostController@blog');
Route::get('/blog/{id}','AdminPostController@show');

Route::resource('/comments','PostCommentsController');


Route::group(['middleware' => 'admin'], function() {

	Route::get('/admin', function () {
		return view('admin.index');
	});

	Route::resource('admin/users', 'AdminUserController');
	Route::resource('admin/posts', 'AdminPostController');
	Route::resource('admin/categorys', 'AdminCategoryController');
	Route::resource('admin/medias','AdminMediaController');


	Route::resource('admin/comments','PostCommentsController');
	Route::resource('admin/comment/replies','CommentRepliesController');
	
});

