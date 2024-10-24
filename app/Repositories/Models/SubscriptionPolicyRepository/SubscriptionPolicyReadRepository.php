<?php
namespace App\Repositories\Models\SubscriptionPolicyRepository;

use Illuminate\Support\Arr;
use App\Const\Options\Settings;
use App\Const\Messages\ErrorMessages;
use App\Const\Options\LanguageOptions;
use App\Models\SubscriptionPolicy;
use App\Models\SubscriptionPolicyAr;
use App\Repositories\basic\IReadRepository;

class SubscriptionPolicyReadRepository implements IReadRepository
{

    public function getAll(array $selected = ["*"]){
    }

    public function getById(int $id , array $selected = ["*"]){}

    public function getByConditions(array $selected = ["*"] , $conditions){}

    public function getFirst(){}




    public function getPolicyByLanguage() {

        if (Settings::getLanguage()  == 'en'){
            $subscriptionPolicy = SubscriptionPolicy::all();

                return $subscriptionPolicy;

        }
            $subscriptionPolicyAr = SubscriptionPolicyAr::all();
                return $subscriptionPolicyAr;
    }



}
