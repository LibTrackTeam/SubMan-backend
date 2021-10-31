<?php

namespace SubMan\Mock;

class MockRepository
{
    private $store = [];

    public function __construct($store)
    {
        $this->store = $store;
    }

    /**
     * Create new
     * 
     * @param array $data
     */
    public function create($data)
    {
        array_push($this->store, $data);
        return $data;
    }

    /**
     * Read one
     * 
     * @param string $id
     * @return object
     */
    public function get($id)
    {
        foreach ($this->store as $s) {
            if ($s["id"] == $id) {
                return $s;
            }
        }
    }

    /**
     * Read all
     * 
     * @return object
     */
    public function getAll()
    {
        return $this->store;
    }


    /**
     * Update an existing
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function update($id, $data)
    {
        $temp_store = [];

        foreach ($this->store as $s) {
            if ($s["id"] == $id) {
                array_replace($s, $data);
            } 
            array_push($temp_store, $s);
        }

        $this->store = $temp_store;
    }
}
