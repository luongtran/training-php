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

Route::get('/','LoginController@getLogin');
Route::post('login','LoginController@postLogin');
Route::get('/list/user', 'HomeController@listUser')->middleware('checkadmin');
Route::get('/create/user', 'HomeController@getAdd')->middleware('checkadmin');
Route::post('user', 'HomeController@saveUser');
Route::get('/user/{id}/edit', 'HomeController@editUser')->middleware('checkadmin');
Route::get('/user/{id}/delete', 'HomeController@delete')->middleware('checkadmin');
Route::post('/user/save', 'HomeController@updateUser');
Route::get('/logout', 'HomeController@Logout');
