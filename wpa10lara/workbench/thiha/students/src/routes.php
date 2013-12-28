<?php 

Route::get('/students', function(){
	return "Hello from Thiha/Students";
});

Route::get('/students/config', function(){
	$site_title = Config::get('students::foo.hoo.har');
	return $site_title;
});

Route::get('/students/lang', function() {
	return Lang::get('students::student.test');
});

Route::get('/students/view', function(){
	return View::make('students::StudentHome');
});

Route::get('/students/facade', function(){
	return Student::greeting();
});

 ?>