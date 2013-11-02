<?php 

define('DD', __DIR__);

require_once DD . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$name = $request->request->get('name');
$response = new Response($name);
$response->send();

// var_dump($request);
// $path_info = $request->getPathInfo();
// $name = $request->query->get('name', 'Hello World'); // $_GET['name']
// $path = explode('/', $path_info);
// call_user_func($path[1]);
// dump($path,true);
/*
$response = new Response(
    'Hello World',
    200,
    array('content-type' => 'text/html')
); 
*/



?>