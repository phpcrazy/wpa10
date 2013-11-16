<?php
/*
Anonymous Function 


class Route {
	public static function get($pattern, $closure) {
		echo $pattern;
		var_dump($closure);
	}
}

$greet = function($name)
{
    printf("Hello %s\r\n", $name);
};

Route::get('/', function($name) {

});

$greet('World');
$greet('PHP');

*/


define('DD', __DIR__);
require_once DD . '/vendor/autoload.php';

use Core\Application;

$app = new Application();

$app->routeAdd('hello', '/hello/{name}', array(
		'name' => 'World', 
		'_controller' => 'HelloController::indexAction'
	)
);
$app->routeAdd('bye', '/bye/{name}/{another}', array('name' => 'World', 'another' => 'for Good', '_controller' => 'ByeController::indexAction'));

$app->combineContext();
$app->routeMatcher();

spl_autoload_register("autoloadController");

$app->run();
$app->responseSend();
unset($app);


function autoloadController($classname) {
	$filename = DD . "/app/controller/" . $classname . ".php";
	if(is_readable($filename)) {
		require $filename;
	} 
}

// $app['cookie_name'] = 'SESSION_ID';
// $app['session_storage_class'] = 'SessionStorage';
/*
$app['cookie_name'] = 'SESSION_ID';
$app['session_storage_class'] = 'SessionStorage';

$app['session_storage'] = function($c) {
    return $c['cookie_name'];
};
*/



?>