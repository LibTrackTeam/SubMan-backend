<?php
namespace SubMan\Repository;

use SubMan\Models\Service as ServiceModel;

interface ServiceRepositoryInterface
{
    /**
     * Get all Services
     * 
     */
    public function all();


    /**
     * Read one Service
     * 
     * @param string $id
     * @return object
     */
    public function getService($id);


}

class ServiceRepository extends ServiceModel implements ServiceRepositoryInterface
{
    /**
     * Return All Services
     */
    public function all()
    {
        $sth = $this->db->prepare("SELECT * from $this->table ");
        $sth->execute();
        $data = $sth->fetchAll(\PDO::FETCH_ASSOC);
        return $data;
    }

    /**
     * Get one Service
     * 
     * @param string $id
     * @return object
     */
    public function getService($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $statement = $this->db->prepare($sql);
        $statement->execute(array(':id' => $id));
        // $result = $statement->fetch(\PDO::FETCH_ASSOC);
        $result = $statement->fetch(\PDO::FETCH_OBJ);
        $result->id = (int) $result->id;
        return $result;
    }
    
}
