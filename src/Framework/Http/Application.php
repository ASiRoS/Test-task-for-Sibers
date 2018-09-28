<?php

namespace Framework\Http;

use Framework\Http;
use Framework\Http\Router\Router;
use Framework\Http\Router\Route;

class Application
{
	private $router;

	public function __construct()
	{
		$this->router = new Router();
	}

	public function run()
	{
		$response = $this->router->match();

		foreach ($response->getHeaders() as $name => $values) {
	        header(sprintf('%s: %s', $name, $value), false);
		}

		http_response_code($response->getStatusCode());
		echo $response->getBody();
	}

	public function get($name, $url, $handler)
	{
		$this->router->get($name, $url, $handler);
	}

	public function post($name, $url, $handler)
	{
		$this->router->post($name, $url, $handler);
	}

	public function patch($name, $url, $handler)
	{
		$this->router->patch($name, $url, $handler);
	}

	public function delete($name, $url, $handler)
	{
		$this->router->delete($name, $url, $handler);
	}
}