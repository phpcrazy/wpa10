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

$app->combineContext();

dump($app['routeCollection'], false);
dump($app['context'], true);

// $app['cookie_name'] = 'SESSION_ID';
// $app['session_storage_class'] = 'SessionStorage';
/*
$app['cookie_name'] = 'SESSION_ID';
$app['session_storage_class'] = 'SessionStorage';

$app['session_storage'] = function($c) {
    return $c['cookie_name'];
};
*/

dump($app['request'], true);

unset($app);

?>