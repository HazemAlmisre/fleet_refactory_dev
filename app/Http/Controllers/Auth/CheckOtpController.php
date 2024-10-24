<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Const\Messages\ErrorMessages;
use App\Adapter\Response\JsonResponse;
use App\Adapter\Response\ViewResponse;
use App\Adapter\Response\Model\JsonModel;
use App\Http\Requests\CheckOtpRequest;
use App\Logic\Application\User\UserCheckOtpService;

class CheckOtpController extends Controller
{
    public function __invoke(CheckOtpRequest $request) {

        $result = (new UserCheckOtpService(
            $request->validated(),  // validate input data..
        ))->execute();

        if(  request()->expectsJson()) {

                $jsonModel = new JsonModel(
                $result , ErrorMessages::$sendSuccess );
                //SuccessLnagKey::$AccountCreated

         return ( new JsonResponse()) -> sendSuccessResponse($jsonModel); // send json response..
        }
        return (new ViewResponse());

    }
}
