<?php
namespace Framework\Http\Router;

use Aura\Router\RouterContainer;

class Router
{
	private $map;
	private $matcher;
	private $request;

	public function __construct()
	{
		$routerContainer = new RouterContainer();

		$this->map 	     =  $routerContainer->getMap();

		$this->matcher   = $routerContainer->getMatcher();

		$this->request   = \Zend\Diactoros\ServerRequestFactory::fromGlobals(
		    $_SERVER,
		    $_GET,
		    $_POST,
		    $_COOKIE,
		    $_FILES
		);
	}

	public function match()
	{
		$route = $this->matcher->match($this->request);

		if (! $route) {
		    // get the first of the best-available non-matched routes
		    $failedRoute = $this->matcher->getFailedRoute();

		    // which matching rule failed?
		    switch ($failedRoute->failedRule) {
		        case 'Aura\Router\Rule\Allows':
		            // 405 METHOD NOT ALLOWED
		            // Send the $failedRoute->allows as 'Allow:'
		            break;
		        case 'Aura\Router\Rule\Accepts':
		            // 406 NOT ACCEPTABLE
		            break;
		        default:
		            throw new \Exception('Page not found');
		            break;
		    }
		}

		foreach ($route->attributes as $key => $val) {
		    $request = $this->request->withAttribute($key, $val);
		}

		$callable = $route->handler;
		$response = $callable($request);

		return $response;
	}

	private function handler($handler)
	{
		if(is_array($handler)) {
			if(class_exists($handler[0])) {
				if(method_exists($handler[0], $handler[1])) {
					return function() use ($handler) {
						$class = new $handler[0];
						 return call_user_func([$class, $handler[1]]);
					};
				}
			}
		} elseif(is_callable($handler)) {
			return $handler;
		}
	}

	public function get($name, $url, $handler)
	{
		$this->map->get($name, $url, $this->handler($handler));
	}

	public function post($name, $url, $handler)
	{
		$this->map->post($name, $url, $this->handler($handler));
	}

	public function patch($name, $url, $handler)
	{
		$this->map->patch($name, $url, $this->handler($handler));
	}

	public function delete($name, $url, $handler)
	{
		$this->map->delete($name, $url, $this->handler($handler));
	}
}