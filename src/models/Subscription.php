<?php

class Subscription
{
    private $id;
    private $cost;
    private $description;
    private $bill_date;
    private $cycle;
    private $reminder;
    private $service_id;
    private $category_id;

    public function __construct(
        $id,
        $cost,
        $description,
        $bill_date,
        $cycle,
        $reminder,
        $service_id,
        $category_id
    ) {
        $this->id = $id;
        $this->cost = $cost;
        $this->description = $description;
        $this->bill_date = $bill_date;
        $this->cycle = $cycle;
        $this->reminder = $reminder;
        $this->service_id = $service_id;
        $this->category_id = $category_id;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_cost()
    {
        return $this->cost;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_bill_date()
    {
        return $this->bill_date;
    }

    public function get_cycle()
    {
        return $this->cycle;
    }

    public function get_reminder()
    {
        return $this->reminder;
    }

    public function get_service_id()
    {
        return $this->service_id;
    }

    public function get_category_id()
    {
        return $this->category_id;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }
    
    public function set_cost($cost)
    {
        $this->cost = $cost;
    }
    
    public function set_description($description)
    {
        $this->description = $description;
    }
    
    public function set_bill_date($bill_date)
    {
        $this->bill_date = $bill_date;
    }
    
    public function set_cycle($cycle)
    {
        $this->cycle = $cycle;
    }
    
    public function set_reminder($reminder)
    {
        $this->reminder = $reminder;
    }
    
    public function set_service_id($service_id)
    {
        $this->service_id = $service_id;
    }
    
    public function set_category_id($category_id)
    {
        $this->category_id = $category_id;
    }
    
}
