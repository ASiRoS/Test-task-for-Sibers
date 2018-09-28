<?php

use Framework\Http\Router\Route;
use Zend\Diactoros\Response;

$app->get('main', '/users/', function() {
    $response = new Response;
    $twig = new Framework\Template\Twig;
    $html = $twig->render('index');
    $response->getBody()->write($html);
    return $response;
});
