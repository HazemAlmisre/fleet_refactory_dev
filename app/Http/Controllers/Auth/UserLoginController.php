<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adapter\Response\JsonResponse;
use App\Adapter\Response\ViewResponse;
use App\Adapter\Response\Model\JsonModel;
use App\Logic\Application\User\UserLoginService;
use App\Repositories\Models\UserRepository\UserReadRepository;

class UserLoginController extends Controller
{


    public function __invoke(Request $request)
    {
        
        // execute service and get result..
        $result = (new UserLoginService(
            $request->all(),  // validate input data..
            (new UserReadRepository)
    ))->execute();  

// build success response 
if(  request()->expectsJson()) {

    $jsonModel = new JsonModel(
        $result , "user login successfully" );
        //SuccessLnagKey::$AccountCreated
        
 return ( new JsonResponse()) -> sendSuccessResponse($jsonModel); // send json response..
}

return (new ViewResponse()); 
    }
   
}
