<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::auth();

// Route::get('/home', 'HomeController@index');

Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');


Route::get('/accountKit','LoginController@accountKit');

Route::get('/loginConfirm','LoginController@fbLogin1');
Route::get('/fbLogin2','LoginController@fbLogin2'); 
Route::post('/emailLogin','LoginController@emailLogin'); 

Route::get('/register','LoginController@emailRegisterView'); 
Route::post('/emailRegister','LoginController@emailRegister'); 

Route::get('/logout', 'LoginController@logout');

Route::get('/welcome', 'HomeController@welcome');
