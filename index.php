<?php

chdir(dirname(__DIR__));

require 'vendor/autoload.php';

$app = new Framework\Http\Application;

require 'config/routes.php';

$app->run();