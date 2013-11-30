<?php 

namespace Core;

use Symfony\Component\HttpKernel\Controller\ControllerResolver;
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
	public function __construct() {
		$this['request'] = Request::createFromGlobals();
		$this['context'] = $this->share(function($this){
			return new RequestContext();
		});
		$this['routeCollection'] = $this->share(function($this){
			return new RouteCollection();
		}); 
		$this['resolver'] = $this->share(function($this){
			return new ControllerResolver();
		});

	}

	public function constructContext() {
		$this['context']->fromRequest($this['request']);
	}

	public function addRoute($name, $pattern, $array) {
		$this['routeCollection']->add($name, new Route($pattern, $array));
	}

	public function routeMatcher() {
		$this['matcher'] = $this->share(function ($this) {
			return new UrlMatcher($this['routeCollection'], $this['context']);
		});
	}

	public function run() {
		try {
			$this['request']->attributes->add($this['matcher']->match($this['context']->getPathInfo()));
			$controller = $this['resolver']->getController($this['request']);
			$arguments = $this['resolver']->getArguments($this['request'], $controller);
			$return = call_user_func($controller);
			$this['response'] = new Response($return, 202);
		} catch(ResourceNotFoundException $e) {
			$this['response'] = new Response('Not Found', 404);
		} catch(Exception $e) {
			$this['response'] = new Response('Error', 500);
  		}
	}

	public function send() {
		$this['response']->send();	
	}
}

 ?>