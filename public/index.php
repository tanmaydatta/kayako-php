<?php


require '../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require '../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require '../src/dependencies.php';

// Register middleware
require  '../src/middleware.php';

// Register routes
require  '../src/routes.php';

// Run app
$app->run();
