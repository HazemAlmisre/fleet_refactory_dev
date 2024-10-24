<?php
namespace App\Http\Controllers\Auth;

use App\Adapter\Response\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Adapter\Response\Model\JsonModel;
use App\Adapter\Response\ViewResponse;
use App\Logic\Application\GetSubscriptionPolicyService;

class GetSubscriptionPolicyController extends Controller
{

    public function __invoke(Request $request)
    {

        // execute service and get result..
        $result = (new GetSubscriptionPolicyService(
            $request->all(),  // validate input data..
    ))->execute();

// build success response
if(  request()->expectsJson()) {

    $jsonModel = new JsonModel(
        $result , "get subscription policy" );

 return ( new JsonResponse()) -> sendSuccessResponse($jsonModel); // send json response..
}

return (new ViewResponse());
    }
}
