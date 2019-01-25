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

Route::get('/', 'PostController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('post/showPostAdmin', 'PostController@showPostAdmin')->name('showPostAdmin');

Route::resource('post', 'PostController');
Route::resource('rol', 'RoleController');
Route::resource('tema', 'ThemeController');
Route::resource('contacto', 'ContactController');
Route::resource('blog', 'BlogController');

Auth::routes();
