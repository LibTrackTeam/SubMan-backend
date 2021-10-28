<?php
namespace SubMan\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SubMan\Repository\ServiceRepository;

final class ServiceController{

    private $serviceRepository;

    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getAllServices(Request $request, Response $response)
    {
        //create new user
        $result = $this->serviceRepository->all();
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    public function getOneService(Request $request, Response $response)
    {
        $id = (int)$request->getAttribute('id');
        //get user
        $result = $this->serviceRepository->getService($id);
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    // public function updateService(Request $request, Response $response)
    // {
    //     // get user id
    //     $id = (int)$request->getAttribute('id');
    //     // Get input from the HTTP request
    //     $data = (array)$request->getParsedBody();
    //     // make validations
    //     if ($error = $this->validateNewUserData($data)) {
    //         $response->getBody()->write(json_encode($error));
    //         return $response->withStatus(400);
    //     }
    //     //update user data
    //     $result = $this->serviceRepository->updateUser($id, $data);
    //     if ($result) {
    //         $response->getBody()->write((string)json_encode(["message" => "update successful"]));
    //         return $response
    //             ->withHeader('Content-Type', 'application/json')
    //             ->withStatus(200);
    //     } else {
    //         $response->getBody()->write((string)json_encode(["error" => "unable to update"]));
    //         return $response
    //             ->withHeader('Content-Type', 'application/json')
    //             ->withStatus(400);
    //     }
    // }
}
