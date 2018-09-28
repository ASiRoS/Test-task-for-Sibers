<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$app = new Framework\Http\Application;

require 'config/routes.php';

define('CURRENT_DIRECTORY', __DIR__);

$app->run();