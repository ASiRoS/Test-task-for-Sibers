<?php

use Framework\Http\Router\Route;
use Zend\Diactoros\Response;
use Framework\Core\Config;
use Framework\Template\Twig;

$app->get('users.index', '/users/', function() {
    $response = new Response;
    $twig = new Twig;

    $html = $twig->render('users/index', [
    	'title' => Config::getSetting('siteName'),
    	'users' => ['mama', 'papa', 'programmist']
    ]);
    
    $response->getBody()->write($html);

    return $response;
});
