<?php 

define('DD', __DIR__);
require DD . '/vendor/autoload.php';
require DD . '/src/Lib/bootstrap.php';

use Core\Application;

$app = new Application();
$app->constructContext();

/* Route Rules */
$app->addRoute('hello', '/hello/{name}', array(
	'name'	=> 'World',
	'_controller' => 'HelloController::actionIndex'
	));

$app->addRoute('bye', '/bye/{name}/{another}', array(
	'name'			=> 'World',
	'another'		=> 'Another',
	'_controller'	=> 'ByeController::actionIndex'
	));

$app->addRoute('goto', '/goto/{name}', array(
	'name'			=> 'Jail',
	'_controller'	=> 'JailController::actionIndex'
	));

$app->routeMatcher();

$app->run();
$app->send();

var_dump($app['routeCollection']);
var_dump($app['context']);
var_dump($app['matcher']);

function helloController($test) {
	return 'Hello World' . $test;
}

function byeController($test) {
	return "Good Bye!" . $test;
}

unset($app);
 ?>