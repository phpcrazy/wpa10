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
Route::group(array('before' => 'auth'), function(){
	Route::get('/', function(){
		$users = DB::table('users')->get();
		foreach($users as $user) {
			echo $user->id . "<br />";
			echo $user->username . "<br />";
			echo $user->email . "<br />";
		}
	});
	Route::get('adduser', function(){
		$user = array(
			'username'	=> 'tester',
			'email'		=> 'tester@gmail.com',
			'password'	=> Hash::make('123456')
			);
		DB::table('users')->insert($user);
	});
	Route::get('user/{id}', function($id){
		$user = DB::table('users')->where('id', $id)->first();
		if(count($user) == 1) {
			return $user->username;
		} else {
			return "Not found!";
		}
	});
	Route::get('logout', function() {
		Auth::logout();
	});
	Route::resource('tweets', 'TweetsController');

	Route::resource('blogs', 'BlogsController');
});

Route::any('/login', array('as' => 'userlogin', function(){
	if(Request::server('REQUEST_METHOD') == 'POST') {
		$email	= Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::intended('/');
		}
	}
	return View::make('user.login');
}));

Route::group(array('prefix' => 'question'), function()
{
	Route::get('create', function(){
		$questionset = array(
		 	'title' => 'Chemistry',
		 	'date'	=> date('Y-m-d'),
		 	'teacher_id'	=> 1
		 );
		var_dump(date("Y-m-d"));
		DB::table('question_sets')->insert($questionset);
	});

	Route::get('update/{id}', function($id){
		$questionset = array(
			'title'	=> 'Biology'
			);
		DB::table('question_sets')
            ->where('id', $id)
            ->update($questionset);
	});
});
/*
Route::group(array('before' => 'auth', 'prefix' => 'auth'), function()
{
    Route::get('/', function()
    {
        // Has Auth Filter
        return "Hello from Home!";
    });
});

Route::group(array('prefix' => 'admin'), function()
{

    Route::get('user', function()
    {
        //
        return "USER";
    });

});

Route::model('user', 'User');

Route::get('profile/{user}', function(User $user)
{
    //
    var_dump($user->id);
    var_dump($user->username);
    return "USer";
});

Route::get('user/profile', array('as' => 'profile', function()
{
   return "User Profile";
}));

Route::get('testuser', function(){
	return Redirect::route('profile');
});

Route::get('adduser', function(){
	$user = array(
		'username'	=> 'thiha',
		'email'		=> 'thiha@gmail.com',
		'password'	=> Hash::make('123456')
		);
	DB::table('users')->insert($user);
});

Route::get('/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});
Route::any('/login', function(){
	if(Request::server('REQUEST_METHOD') == 'POST') {
		$email	= Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			return Redirect::intended('/');
		}
	}
	return View::make('user.login');
});
*/

Route::get('wpa11/hello/{name}', function($name){
	return "Hello from WPA 11, I'm " .$name;
});
