<?php

namespace SubMan\Graphql;

use Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use GraphQL\GraphQL;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

class Controller{

    public static function execute(Request $request, Response $response){
        $input = $request->getParsedBody();
        $query = $input['query'];
        $variables = $input['variables'] ?? null;

        $queryType = new ObjectType([
            'name' => 'Query',
            'fields' => [
                'echo' => [
                    'type' => Type::string(),
                    'args' => [
                        'message' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function ($rootValue, $args) {
                        return $rootValue['prefix'] . $args['message'];
                    }
                ],
            ],
        ]);

        $schema = new Schema(['query' => $queryType]);

        try {
            $rootValue = ['prefix' => 'You said: '];
            $result = GraphQL::executeQuery($schema, $query, $rootValue, null, $variables);
            $output = $result->toArray();
        } catch (Exception $exception) {
            $output = [
                'error' => [
                    [
                        'message' => $exception->getMessage()
                    ]
                ]
            ];
        }

        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write(json_encode($output));

        return $response;

    
    }
}
