<?php
use Slim\Routing\RouteCollectorProxy;
use SubMan\Controller\UserController;

// user group
$group->group('/user', function (RouteCollectorProxy $group) use ($app) {
    $group->post('/', [UserController::class, 'createUser']);
    $group->get('/{id}', [UserController::class, 'readUser']);
    $group->put('/{id}', [UserController::class, 'updateUser']);
});

