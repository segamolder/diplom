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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/uploadfile','UploadFileController@index');
Route::post('/home','HomeController@showUploadFile');
Route::get('/home/getUserDir', 'HomeController@getUserDir');
Route::get('/home/getUserId', 'HomeController@getUserId');
Route::get('/home/{id}', 'HomeController@getImages');
Route::get('/user/getAllImages', 'UserController@getAllImages');
Route::post('/home/saveAll','HomeController@saveAll');
Route::post('/home/updateAll','HomeController@updateAll');
Route::get('/user', 'UserController@index')->name('user');
