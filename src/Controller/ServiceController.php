<?php
namespace SubMan\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SubMan\Repository\ServiceRepositoryInterface as Repository;

final class ServiceController{

    private $serviceRepository;

    public function __construct(Repository $serviceRepository)
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
            ->withStatus(200);
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
}
