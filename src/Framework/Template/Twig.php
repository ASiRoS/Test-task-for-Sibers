<?php
namespace Framework\Template;

class Twig
{
	private $twig;

	public function __construct()
	{
		$loader = new \Twig_Loader_Filesystem(CURRENT_DIRECTORY . '/twig/templates');

		$this->twig = new \Twig_Environment($loader, array(
		    'cache' => CURRENT_DIRECTORY . '/twig/cache',
		));
	}

	public function render($template)
	{
		return $this->twig->render("{$template}.html.twig", array('name' => 'Fabien'));
	}
}