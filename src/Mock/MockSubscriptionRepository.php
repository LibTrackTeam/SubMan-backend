<?php

namespace SubMan\Mock;

use SubMan\Repository\SubscriptionRepositoryInterface;

class MockSubscriptionRepository extends MockRepository implements SubscriptionRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(
            [
                "id"=> 1,
                "service_id"=> 1,
                "cost"=> 11.99,
                "description"=> "every movie you want",
                "start_date"=> "11:24 12th June 2021",
                "bill_date"=> "11:24 12th June 2021",
                "cycle"=> "6 months",
                "reminder"=> True,
                "category_id"=> 1,
                "archived"=> True,
            ],
            [
                "id"=> 2,
                "service_id"=> 2,
                "cost"=> 4.99,
                "description"=> "other movies i watch",
                "start_date"=> "11:24 12th June 2021",
                "bill_date"=> "11:24 12th June 2021",
                "cycle"=> "1 year",
                "reminder"=> True,
                "category_id"=> 2,
                "archived"=> False,
            ],
            [
                "id"=> 3,
                "service_id"=> 3,
                "cost"=> 18.99,
                "description"=> "every book i read",
                "start_date"=> "11:24 12th June 2021",
                "bill_date"=> "11:24 12th June 2021",
                "cycle"=> "1 year",
                "reminder"=> True,
                "category_id"=> 1,
                "archived"=> False,
            ]
            );
    }

    /**
     * Create a new subscription
     * 
     * @param array $data
     */
    public function createSubscription($data)
    {
        return $this->create($data);
    }

    /**
     * get one subscription
     * 
     * @param string $id
     * @return object
     */
    public function getSubscription($id){
        return $this->get($id);
    }

    /**
     * Read one subscription
     * 
     * @param string $id
     * @return object
     */
    public function getAllSubscriptions(){
        return $this->getAll();
    }


    /**
     * Update an existing subscription
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateSubscription($id,$data){
        return $this->update($id, $data);
    }
}