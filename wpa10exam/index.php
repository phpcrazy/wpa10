<?php 

define('DD', __DIR__);

require_once DD . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

$request = Request::createFromGlobals();


$path_info = $request->getPathInfo();

// dump($path_info, true);

// $name = $request->query->get('name'); // Get Method
// $request->request->get('name') // Post Method
// $name = $request->request->get('name');

// dump($request->cookies->all());
// dump($request->server->all());
// dump($request->headers->all());
// dump($request->attributes->all(), true);

$routes = new RouteCollection();
$routes->add('show_post', new Route('/show/{slug}'));
$routes->add('zayar', new Route('/hlaingtharyar/{car}'));
$routes->add('dog', new Route('/run/{mile}'));
$routes->add('hum', new Route('/{hum}/{type}/{count}'));

dump($routes, false);

$context = new RequestContext();
$context->fromRequest($request);

dump($context, false);

$matcher = new UrlMatcher($routes, $context);
/*
$test = array(
	'id' => 1,
	'name' => 'Aung Aung');
extract($test);
dump($id, false);
dump($name, true);
*/
try {
	dump($matcher->match($request->getPathInfo()));
	extract($matcher->match($request->getPathInfo()), EXTR_SKIP);
	call_user_func($_route);
	dump($mile, false);
} catch (ResourceNotFoundException $e) {
	$response = new Response('Not Found', 404);
} catch (Exception $e) {
	$response = new Response('Error', 500);
}
$response->send();
die();
$response = new Response();
$response->prepare($request);

$response->setContent('HelloWorld!');
$response->headers->set('Content-Type', 'text/plain');
$response->headers->setCookie(new Cookie('admin', 'true'));
$response->setStatusCode(200);
$response->send();

function dog() {
	echo "Bark!";
}

?>