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

Route::get('/', 'postController@index');

Route::resource('post', 'postController');
Route::resource('rol', 'roleController');

Route::get('showPostAdmin/{slug}', 'postController@showPostAdmin');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
