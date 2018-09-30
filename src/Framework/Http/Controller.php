<?php

namespace Framework\Http;

use Zend\Diactoros\Response;
use Framework\Core\Config;
use Framework\Template\Twig;

class Controller
{
	private $response;
	private $twig;
	private $config;

	public function __construct()
	{
		$this->response = new Response;
		$this->twig = new Twig;
	}

	protected function render(string $file, array $data) : string
	{
		$data = array_merge($data, [
			'title' => Config::getSetting('siteName')
		]);
		
		return $this->twig->render($file, $data);
	}

	protected function write($html) : Response
	{
		$this->response->getBody()->write($html);
		return $this->response;
	}
}