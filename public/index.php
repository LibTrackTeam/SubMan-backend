<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new \DI\Container();

// setting up database
$database = require __DIR__ . '/../app/database.php';
$container->set("db", $database);

// initializing up with container
AppFactory::setContainer($container);
$app = AppFactory::create();

$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();