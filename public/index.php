<?php

if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/../vendor/autoload.php';

// session_start();

// Instantiate the app
$settings = require __DIR__ . '/../app/config/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
$dependencies = require __DIR__ . '/../app/config/dependencies.php';
$dependencies($app);

// Register routes
$routes = require __DIR__ . '/../app/config/routes.php';
$routes($app);

// Run app
$app->run();