<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$settings = require 'config/settings.php'; 
$app = new Framework\Http\Application($settings);

require 'config/routes.php';

define('CURRENT_DIRECTORY', __DIR__);

$app->run();