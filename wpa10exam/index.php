<?php 

define('DD', __DIR__);

require_once DD . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

var_dump($request);

?>