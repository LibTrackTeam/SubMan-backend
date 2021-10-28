<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;

// category group
$group->group('/category', function (RouteCollectorProxy $group) use ($app) {

    $group->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello From Category Endpoint");
        return $response;
    });
});
