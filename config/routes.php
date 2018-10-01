<?php

namespace App\Http\Controllers;

$app->get('users.index', '/users', [UserController::class, 'index']);

$app->get('users.add', '/users/add', [UserController::class, 'add']);

$app->get('users.view', '/users/{id}', [UserController::class, 'view']);

$app->post('users.store', '/users/store', [UserController::class, 'store']);

$app->get('users.edit', '/users/edit/{id}', [UserController::class, 'edit']);

$app->post('users.update', '/users/edit/{id}', [UserController::class, 'update']);

$app->get('users.delete', '/users/delete/{id}', [UserController::class, 'delete']);

$app->get('sign-in', '/sign-in', [LoginController::class, 'signIn']);
