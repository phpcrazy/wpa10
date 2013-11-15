<?php 

namespace Core;

use Symfony\Component\HttpKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Illuminate\Container\Container;


class Application extends Container {
	public $var = array();

	protected $request;

	public function __construct() {
		$this['request'] = Request::createFromGlobals();
		$this['routeCollection'] = $this->share(function ($this) {
            return new RouteCollection();
        });
		$this['context'] = $this->share(function($this){
			return new RequestContext();
		});
		$this['resolver'] = $this->share(function($this){
			return new HttpKernel\Controller\ControllerResolver();
		});
	}

	public function combineContext(){
		$this['context']->fromRequest($this['request']);
	}

	public function routeAdd($route_name, $pattern, $array) {
		$this['routeCollection']->add($route_name, new Route($pattern, $array));
	}

	public function routeMatcher() {
		$this['matcher'] = $this->share(function ($this) {
			return new UrlMatcher($this['routeCollection'], $this['context']);
		});
	}

	public function run() {
		try {
			$this['request']->attributes->add($this['matcher']->match($this['request']->getPathInfo()));
			// $response = call_user_func($this['request']->attributes->get('_controller'), $this['request']);
			$controller = $this['resolver']->getController($this['request']);
			$arguments = $this['resolver']->getArguments($this['request'], $controller);
			$response = call_user_func($controller, $arguments);
			$this['response'] = new Response($response);
		} catch (ResourceNotFoundException $e) {
			$this['response'] = new Response('Not Found', 404);
		} catch (Exception $e) {
			$this['response'] = new Response('Error', 500);
		}
	}

	public function responseSend() {
		$this['response']->send();
	}
}

 ?>