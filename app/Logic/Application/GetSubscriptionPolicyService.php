<?php
namespace App\Logic\Application;

use App\Const\Messages\ErrorMessages;
use App\Logic\Service;
use App\Repositories\Models\SubscriptionPolicyRepository\SubscriptionPolicyReadRepository;
use Illuminate\Database\Eloquent\Model;

class GetSubscriptionPolicyService implements Service {

    public function execute()
    {
        $repository = new SubscriptionPolicyReadRepository();

        $policy =  $repository->getPolicyByLanguage();

        if($policy == null){make_exception(ErrorMessages::$SomeThingWentWrong);}

        return $policy;
    }
}
