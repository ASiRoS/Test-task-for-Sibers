<?php

namespace App\Http\Controllers;

$app->get('users.index', '/users', [User::class, 'index']);

$app->get('users.add', '/users/add', [User::class, 'add']);
