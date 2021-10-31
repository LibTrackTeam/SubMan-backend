<?php
namespace SubMan\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use SubMan\Repository\UserRepositoryInterface as Repository;

final class UserController{

    private $userRepository;

    public function __construct(Repository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(Request $request, Response $response)
    {
        // Get input from the HTTP request
        $data = (array)$request->getParsedBody();

        // make validations
        if ($error = $this->validateNewUserData($data)) {
            $response->getBody()->write(json_encode($error));
            return $response->withStatus(400);
        }
        //create new user
        $result = $this->userRepository->createUser($data);
        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    public function readUser(Request $request, Response $response)
    {
        $id = (int)$request->getAttribute('id');
        //get user
        $result = $this->userRepository->getUser($id);
        $response->getBody()->write((string)json_encode($result));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }

    public function updateUser(Request $request, Response $response)
    {
        // get user id
        $id = (int)$request->getAttribute('id');
        // Get input from the HTTP request
        $data = (array)$request->getParsedBody();
        // make validations
        if ($error = $this->validateNewUserData($data)) {
            $response->getBody()->write(json_encode($error));
            return $response->withStatus(400);
        }
        //update user data
        $result = $this->userRepository->updateUser($id, $data);
        if ($result) {
            $response->getBody()->write((string)json_encode(["message" => "update successful"]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            $response->getBody()->write((string)json_encode(["error" => "unable to update"]));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
        }
    }

    /**
     * Validation for user data
     * 
     * @param array $data
     * 
     * @return array
     */
    public function validateNewUserData(array $data,$for="all")
    {
        $errors = array();
        if ($for == 'create') {
            if (!isset($data['uid'])) {
                $errors['uid'] = 'Input required';
            }elseif(empty($data['uid'])){
                $errors['uid'] = 'Input cannot be empty';
            }
        }
        if (empty($data['currency'])) {
            $errors['currency'] = 'Input required';
        }
        if (empty($data['message_token'])) {
            $errors['message_token'] = 'Input required';
        }
        return $errors;
    }
}
