<?php

use SubMan\Repository\UserRepository;
use Slim\Factory\AppFactory;
use Slim\Middleware\BodyParsingMiddleware;
use Psr\Container\ContainerInterface;
use SubMan\Repository\ServiceRepository;
use SubMan\Repository\ServiceRepositoryInterface;
use SubMan\Repository\UserRepositoryInterface;

require __DIR__ . '/../vendor/autoload.php';

$container = new \DI\Container();

// setting up database
$database = require __DIR__ . '/../app/database.php';
// $container->set(PDO::class, $database);
$container->set('db', $database);

$container->set(ServiceRepositoryInterface::class, function(ContainerInterface $containerInterface){
    return new ServiceRepository($containerInterface);
});

// Autowiring not working for me, so am manually binding the interfaces with thier implementation
// Bind Interfaces to Implementations
$container->set(UserRepositoryInterface::class, function(ContainerInterface $containerInterface){
    return new UserRepository($containerInterface);
});


// initializing up with container
AppFactory::setContainer($container);
$app = AppFactory::create();
 
// https://www.slimframework.com/docs/v4/middleware/body-parsing.html
$app->addBodyParsingMiddleware();


$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$app->run();