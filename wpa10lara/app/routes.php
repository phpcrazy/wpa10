<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/user/{id}', function($id){
	return "Hello User" . $id;
});

Route::get('/userview', function(){
	$title = "Myanmar Links";
	return View::make('user')->with('title', $title);
});

Route::get('/cuser', 'UserController@actionIndex');

Route::post('getuser', function(){
	$username = Input::get('username');
	echo $username;
});

Route::get('/', function()
{
	return View::make('hello');
});