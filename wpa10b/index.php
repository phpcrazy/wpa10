<?php 

define('DD', __DIR__);
require_once DD . '/vendor/autoload.php';

use Core\Application;

$app = new Application();
$app->constructContext();

require_once DD . '/src/Lib/bootstrap.php';
require_once DD . "/src/routes.php";

$app->routeMatcher();

$app->run();
$app->send();

unset($app);
 ?>