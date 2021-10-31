<?php

interface SubscriptionRepositoryInterface
{    
    /**
     * Create a new subscription
     * 
     * @param array $data
     */
    public function createSubscription($data);

    /**
     * get one subscription
     * 
     * @param string $id
     * @return object
     */
    public function getSubscription($id);

    /**
     * Read one subscription
     * 
     * @param string $id
     * @return object
     */
    public function getAllSubscriptions();


    /**
     * Update an existing subscription
     * 
     * @param string $id
     * @param array $data
     * @return object
     */
    public function updateSubscription($id,$data);
    
}

