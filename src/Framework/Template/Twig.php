<?php
namespace Framework\Template;

use Framework\Core\Config;

class Twig
{
	private $twig;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(CURRENT_DIRECTORY . '/twig/templates');

		$options = [
			'cache' => CURRENT_DIRECTORY . '/twig/cache',
		];
		
		if(Config::getSetting('isDev')) {
			$options = [
				'debug' => true,
				'cache' => false,
			];
		}

		$this->twig = new \Twig_Environment($loader, $options);

		if(Config::getSetting('isDev')) {
			$this->twig->addExtension(new \Twig_Extension_Debug());
		}
	}

	public function render($template, array $data)
	{
		return $this->twig->render("{$template}.html.twig", $data);
	}
}