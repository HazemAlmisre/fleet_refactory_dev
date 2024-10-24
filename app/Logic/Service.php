<?php
namespace App\Logic;

use App\Adapter\Response\ResponseLogic;
use Illuminate\Database\Eloquent\Model;

interface Service  {
    public function execute () : Array | Model ;

}
