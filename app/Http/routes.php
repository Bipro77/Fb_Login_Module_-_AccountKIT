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
Route::get('/loginConfirm', 'LoginController@loginConfirm');
Route::get('/loginConfirm2','LoginController@loginConfirm2'); 

Route::get('/welcome', 'HomeController@welcome');
