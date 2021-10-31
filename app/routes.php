<?php

use Slim\App;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use SubMan\Graphql\Controller;

return function (App $app){

    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello SubMan!");
        return $response;
    });
    
    // just to test the db 
    $app->get('/db', function (Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $sth = $db->prepare("SELECT * from users");
        $sth->execute();
        $data = $sth->fetchAll(PDO::FETCH_ASSOC);
        $payload = json_encode($data);
        $response->getBody()->write($payload);
        // $response->getBody()->write("Hello SubMan! $thefoo");
        return $response->withHeader('Content-Type', 'application/json');
    });

    // group REST endpoints together
    $app->group('/rest', function (RouteCollectorProxy $group) use ($app){
        // load REST routes from endpoints folder
        foreach (glob(__DIR__."/../app/endpoints/*.php") as $route) {
            require $route;
        }
    });

    $app->post('/graphql', function(Request $request, Response $response, $args){
        // $response->getBody()->write("Hello SubMan Graphql!");
        // return $response;
        return Controller::execute($request, $response);
    });
    

};