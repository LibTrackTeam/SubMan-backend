<?php

namespace SubMan\Mock;

use SubMan\Repository\ServiceRepositoryInterface;

class MockServiceRepository extends MockRepository implements ServiceRepositoryInterface
{
    public function __construct()
    {
        return parent::__construct(
            [
                [
                    "id" => 1,
                    "name" => "Netflix",
                    "icon" => "logo.png",
                    "color" => "red"
                ],
                [
                    "id" => 2,
                    "name" => "Youtube",
                    "icon" => "logo.png",
                    "color" => "red"
                ],
                [
                    "id" => 3,
                    "name" => "Goodreads",
                    "icon" => "logo.png",
                    "color" => "blue"
                ],
                [
                    "id" => 4,
                    "name" => "Medium",
                    "icon" => "logo.png",
                    "color" => "black"
                ]
            ]
        );
    }

    /**
     * Get all Services
     * 
     */
    public function all()
    {
        return $this->getAll();
    }


    /**
     * Read one Service
     * 
     * @param string $id
     * @return object
     */
    public function getService($id)
    {
        return $this->get($id);
    }
}
