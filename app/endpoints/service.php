<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Routing\RouteCollectorProxy;

// service group
$group->group('/service', function (RouteCollectorProxy $group) use ($app) {

    $group->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello From Service Endpoint");
        return $response;
    });
});
