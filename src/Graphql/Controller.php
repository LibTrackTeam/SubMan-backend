<?php

namespace SubMan\Graphql;

use Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;
use GraphQL\Utils\BuildSchema;

class Controller
{

    public static function execute(Request $request, Response $response)
    {
        $input = $request->getParsedBody();
        $query = $input['query'];
        $variables = $input['variables'] ?? null;

        // get schema
        $schema = BuildSchema::build(SDL::get());

        // get resolvers
        $root = [
            'category' => Resolver::category(),
            'service' => Resolver::service(),
            'subscription' => Resolver::subscription(),
            'user' => Resolver::user(),
        ];

        $output = GraphQL::executeQuery($schema, $query, $root, null, $variables);
        $response->getBody()->write(json_encode($output));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
