<?php 

define('DD', __DIR__);

require_once DD . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

// $request->query->get('name') // Get Method
// $request->request->get('name') // Post Method

$response = new Response($name);
$response->send();

?>