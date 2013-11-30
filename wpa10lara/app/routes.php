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

// Route::get
// Route::any
// Route::put
// Route::delete

Route::group(array('before' => 'old'), function()
{
    Route::any('/foo', function()
    {
    	return "Fool!";
        // Has Auth Filter
    });

    Route::any('/bar', function()
    {
        // Has Auth Filter
        return "Bar!";
    });
});

Route::any('/test', array(
	'before'	=> 'old', function(){
		return 'You got it!';
}));

Route::any('/user', function(){
	if(Input::has('name')) {
		$name = Input::except('foo');
		return $name;	
	}
	$response = Response::make('Not Found', 404);
	$cookie = Cookie::make('name', 'value');
	return $response->withCookie($cookie);
});


