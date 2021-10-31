<?php
use Slim\Routing\RouteCollectorProxy;
use SubMan\Controller\ServiceController;

// service group
$group->group('/service', function (RouteCollectorProxy $group) use ($app) {
    $group->get('', [ServiceController::class, 'getAllServices']);
    $group->get('/{id}', [ServiceController::class, 'getOneService']);
    // For Admin
    // $group->post('', [ServiceController::class, 'createService']);
    // $group->put('/{id}', [ServiceController::class, 'updateService']);
    // $group->delete('/{id}', [ServiceController::class, 'deleteService']);
});
