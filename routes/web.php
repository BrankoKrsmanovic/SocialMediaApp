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


Route::get('/profile/{user}', 'ProfilesController@index');
Route::get('/profile/{user}/edit', 'ProfilesController@edit');
Route::patch('/profile/{user}', 'ProfilesController@update');

Route::get('/post/create', 'PostsController@create');
Route::post('/post', 'PostsController@store');
Route::get('/post/{post}', 'PostsController@show');

Route::post('/api/follow/{user}', 'ApiController@followUser');
Route::post('/api/like/{post}', 'ApiController@likePost');
Route::get('/api/like/{post}', 'ApiController@getNumberOfLikes');
Route::delete('/api/post/{post}', 'ApiController@destroy');
Route::get('/api/profile/{criteria}', 'ApiController@getProfiles');


