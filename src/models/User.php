<?php
namespace SubMan\Models;
use Psr\Container\ContainerInterface;
class User
{
    protected $table = "users";

    private $id;
    private $uid;
    private $currency;
    private $message_token;
    protected $container;
    protected $db;

    public function __construct(
        // $id,
        // $uid,
        // $currency,
        // $message_token
        ContainerInterface $containerInterface
    ){
        $this->container = $containerInterface;
        $this->db = $containerInterface->get('db');
        // $this->id = $id;
        // $this->uid = $uid;
        // $this->currency = $currency;
        // $this->message_token = $message_token;
    }

    public function get_id() { return $this->id;}

    public function get_uid() { return $this->uid;}

    public function get_currency() { return $this->currency;}

    public function get_message_token() { return $this->message_token;}

    public function set_id($id){ $this->id = $id; }

    public function set_uid($uid){ $this->uid = $uid; }

    public function set_currency($currency){ $this->currency = $currency; }

    public function set_message_token($message_token){ $this->message_token = $message_token; }
        
}

