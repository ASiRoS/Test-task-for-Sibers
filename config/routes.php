<?php

use Framework\Http\Router\Route;
use Zend\Diactoros\Response;

$app->get('main', '/blog/{id}', function($request) {
	$id = (int) $request->getAttribute('id');
    $response = new Response;
    $response->getBody()->write("You asked for blog entry {$id}");
    return $response;
});
