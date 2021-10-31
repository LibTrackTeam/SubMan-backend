<?php

namespace SubMan\Mock;

class MockCategoryRepository extends MockRepository implements \SubMan\Repository\CategoryRepositoryInterface
{
    public function __construct()
    {
        $store= [
            [
                "id" => 1,
                "name" => "movies",
                "icon" => "x32.png",
                "color" => "red"
            ],
            [
                "id" => 2,
                "name" => "blog",
                "icon" => "x32.png",
                "color" => "blue"
            ],
            [
                "id" => 3,
                "name" => "podcast",
                "icon" => "x32.png",
                "color" => "pink"
            ],
            [
                "id" => 4,
                "name" => "gifts",
                "icon" => "x32.png",
                "color" => "green"
            ]
            ];
        return parent::__construct($store);
    }
    /**
     * Create a new category
     * 
     * @param array $data
     */
    public function createCategory($data)
    {
        return $this->create($data);
    }

    /**
     * get one category
     * 
     * @param string $id
     * @return object
     */
    public function getCategory($id)
    {
        return $this->get($id);
    }

    /**
     * Read all categories
     * 
     * @param string $id
     * @return object
     */
    public function getAllCategories()
    {
        return $this->getAll();
    }


    /**
     * Update an existing category
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateCategory($id, $data)
    {
        return $this->update($id, $data);
    }
}
