<?php
namespace App\Adapter\Response;

use App\Adapter\Response\JsonResponse;
use App\Adapter\Response\ViewResponse;
use App\Adapter\Response\Model\JsonModel;
use App\Adapter\Response\Model\ViewModel;

class ResponseLogic
{
    function __construct() {}

    public function sendSuccessResponse(JsonModel | ViewModel $data) {
        if (request()->expectsJson()) {
            return new JsonResponse();
        }
        return new ViewResponse();
    }

    public function sendFiledResponse(JsonModel | ViewModel  $data) {
        if (request()->expectsJson()) {
            return new JsonResponse();
        }
        return new ViewResponse();
    }


}
