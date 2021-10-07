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

Auth::routes();

Route::get('/', 'HomePageController@index')->name('homepage');
Route::get('/profile', 'Profile\ProfileController@index')->name('profile');
Route::get('/showPosts', 'Profile\ProfileController@ShowPosts')->name('show.posts');

// POST
Route::post('addPosts', 'Profile\ProfileController@storePost')->name('post.store');
Route::get('getuser', 'Profile\ProfileController@getUser')->name('get.User');
