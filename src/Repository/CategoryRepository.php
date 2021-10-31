<?php

interface CategoryRepositoryInterface
{    
    /**
     * Create a new category
     * 
     * @param array $data
     */
    public function createCategory($data);

    /**
     * get one category
     * 
     * @param string $id
     * @return object
     */
    public function getCategory($id);

    /**
     * Read one category
     * 
     * @param string $id
     * @return object
     */
    public function getAllCategories();


    /**
     * Update an existing category
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateCategory($id,$data);
    
}