<?php

namespace App\Http\Controllers\Auth;

use UserRegisterService;
use App\Http\Controllers\Controller;
use App\Adapter\Response\JsonResponse;
use App\Adapter\Response\ViewResponse;
use App\Adapter\Response\Model\JsonModel;
use App\Http\Requests\UserRegisterRequest;
use App\Repositories\Models\UserRepository\UserCreateRepository;
use App\Logic\Application\User\UserRegisterService as UserUserRegisterService;

class UserRegisterController extends Controller
{

    public function __invoke(UserRegisterRequest $request){


        // execute service and get result..
        $result = (new UserUserRegisterService(
                $request->validated(),  // validate input data..
                (new UserCreateRepository)
        ))->execute();


    // build success response
    if(request()->expectsJson()) {

        $jsonModel = new JsonModel(
            $result,
            "account created successfully"
        );
            //SuccessLnagKey::$AccountCreated

     return ( new JsonResponse()) -> sendSuccessResponse($jsonModel); // send json response..
    }
    return (new ViewResponse());
}



}
