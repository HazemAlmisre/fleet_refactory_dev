<?php
namespace App\Adapter\Response\Model;

class JsonModel
{
    public function __construct(private $data, private $message,private $status = 404 ){}

    function getData(){
        return $this->data;
    }

    function getMessage(){
        return $this->message;
    }

    function getStatus(){
        return $this->status;
    }
}
