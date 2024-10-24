<?php
namespace App\Adapter\Response\Model;


class ViewModel
{
    public function __construct(private $data, private string  $dataKey, private string $viewPath){}

    public function getData(){
        return $this->data;
    }
    public function getDataKey(){
        return $this->dataKey;
    }
    public function getViewPath(){
        return $this->viewPath;
    }
}
