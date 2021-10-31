<?php
namespace SubMan\Repository;

use PDOException;
use SubMan\Models\User as ModelsUser;

interface UserRepositoryInterface
{    
    /**
     * Create a new user
     * 
     * @param array $data
     */
    public function createUser($data);

    /**
     * Read one user
     * 
     * @param string $id
     * @return object
     */
    public function getUser($id);


    /**
     * Update an existing user's records
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateUser($id,$data);
    
}

class UserRepository extends ModelsUser implements UserRepositoryInterface
{

    /**
     * Create a new user
     * 
     * @param array $data
     */
    public function createUser($data)
    {
        $sql = "INSERT INTO $this->table SET `uid` = ?, `currency` = ?, `message_token` = ?";
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute(array($data['uid'],$data['currency'],$data['message_token']));
            if ($this->db->lastInsertId()) {
                return $this->getUser($this->db->lastInsertId());
            } else {
                return ['error' => 'unable to create user'];
            }
        } catch (PDOException $e) {
            $this->db->rollback();
            return $e->getMessage();
        }
    }

    /**
     * Read one user
     * 
     * @param string $id
     * @return object
     */
    public function getUser($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->execute(array(':id' => $id));
        // $result = $statement->fetch(\PDO::FETCH_ASSOC);
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        $result->id = (int) $result->id;
        return $result;
    }

    /**
     * Update an existing user's records
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateUser($id,$data)
    {
        $sql = "UPDATE $this->table SET `currency` = ?, `message_token` = ? WHERE `id` = ?";
        $statement = $this->db->prepare($sql);
        $result = $statement->execute(array($data['currency'],$data['message_token'],$id));
        return $result;
    }
    
}