<?php

use SubMan\Repository\UserRepository;
use Slim\Factory\AppFactory;
use Slim\Middleware\BodyParsingMiddleware;
use SubMan\Controller\UserController;
use Psr\Container\ContainerInterface;

require __DIR__ . '/../vendor/autoload.php';

$container = new \DI\Container();

// setting up database
$database = require __DIR__ . '/../app/database.php';
// $container->set(PDO::class, $database);
$container->set('db', $database);

// Bind controllers to the container
// so we can resolve them in routes.php
$container->set('UserController', function (ContainerInterface $container) {
    new UserController(new UserRepository($container));
});


// initializing up with container
AppFactory::setContainer($container);
$app = AppFactory::create();
 
// https://www.slimframework.com/docs/v4/middleware/body-parsing.html
$app->addBodyParsingMiddleware();


$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();