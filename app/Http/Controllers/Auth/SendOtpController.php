<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\SendOtpRequest;
use App\Adapter\Response\JsonResponse;
use App\Adapter\Response\ViewResponse;
use App\Adapter\Response\Model\JsonModel;
use App\Const\Messages\ErrorMessages;
use App\Logic\Application\User\UserSendOtpService;

class SendOtpController extends Controller
{
    public function __invoke(SendOtpRequest $request)
    {

        $result = (new UserSendOtpService(
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
