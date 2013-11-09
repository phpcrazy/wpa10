<?php 

namespace Core;

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
	public function __construct() {
		$this['request'] = Request::createFromGlobals();
		$this['routeCollection'] = $this->share(function ($this) {
            return new RouteCollection();
        });
		$this['context'] = $this->share(function($this){
			return new RequestContext();
		});

	}

	public function combineContext(){
		$this['context']->fromRequest($this['request']);
	}

}

 ?>