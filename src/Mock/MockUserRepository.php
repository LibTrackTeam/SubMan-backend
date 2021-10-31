<?php

namespace SubMan\Mock;

use SubMan\Repository\UserRepositoryInterface;

class MockUserRepository extends MockRepository implements UserRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(
            [
                [
                    "id" => 1,
                    "uid" => "11111",
                    "currency" => "NGN",
                    "message_token" => "poajenfae",
                ],
                [
                    "id" => 2,
                    "uid" => "222222",
                    "currency" => "GHS",
                    "message_token" => "awerewrw",
                ],
                [
                    "id" => 3,
                    "uid" => "333333",
                    "currency" => "USD",
                    "message_token" => "adfae4443",
                ],
                [
                    "id" => 4,
                    "uid" => "44444",
                    "currency" => "EUR",
                    "message_token" => "ioiaopo9jno",
                ]

            ]
        );
    }

    /**
     * Create a new user
     * 
     * @param array $data
     */
    public function createUser($data)
    {
        return $this->create($data);
    }

    /**
     * Read one user
     * 
     * @param string $id
     * @return object
     */
    public function getUser($id)
    {
        return $this->get($id);
    }


    /**
     * Update an existing user's records
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }
}
