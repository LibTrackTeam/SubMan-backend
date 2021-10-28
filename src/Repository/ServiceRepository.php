<?php
namespace SubMan\Repository;

use Psr\Container\ContainerInterface;
use SubMan\Models\Service;

class ServiceRepository extends Service
{
    private $db;
    public function __contruct(ContainerInterface $containerInterface)
    {
        parent::__construct($containerInterface);
    }

    /**
     * Return All Services
     */
    public function all()
    {
        $this->db = $this->container->get('db');
        $sth = $this->db->prepare("SELECT * from $this->table ");
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Get all Services
     * 
     * @param string $uid
     * @param string $currency
     * @param string $message_token
     */
    // public function createUser($data)
    // {
    //     $this->db = $this->container->get('db');
    //     $sql = "INSERT INTO $this->table SET `uid` = ?, `currency` = ?, `message_token` = ?";
    //     $statement = $this->db->prepare($sql);
    //     try {
    //         $statement->execute(array($data['uid'],$data['currency'],$data['message_token']));
    //         if ($this->db->lastInsertId()) {
    //             return $this->getUser($this->db->lastInsertId());
    //         } else {
    //             var_dump("error");die();
    //         }
    //     } catch (PDOExecption $e) {
    //         $this->db->rollback();
    //         return $e->getMessage();
    //     }
    // }

    /**
     * Get Service
     * 
     * @param string $uid
     * @return object
     */
    public function getService($id)
    {
        $this->db = $this->container->get('db');
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
     * @param string $data
     */
    // public function updateService($id,$data)
    // {
    //     $this->db = $this->container->get('db');
    //     $sql = "UPDATE $this->table SET `currency` = ?, `message_token` = ? WHERE `id` = ?";
    //     $statement = $this->db->prepare($sql);
    //     $result = $statement->execute(array($data['currency'],$data['message_token'],$id));
    //     return $result;
    // }
    
}
