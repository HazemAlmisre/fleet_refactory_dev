<?php
namespace App\Logic\Application\User;

use App\Const\Messages\ErrorMessages;
use App\Logic\Service;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Models\UserRepository\UserReadRepository;
use Illuminate\Support\Facades\Http;

class UserCheckOtpService implements Service  {
    private string $userId;
    private string $code;


    public function __construct( Array $input ,
    ){
        $this->userId  = $input['userId'];
        $this->code  = $input['code'];
    }



    public function execute ( ): Array | Model {

    if (getCatch("user_id_".$this->userId) == null) {
        make_exception(ErrorMessages::getKey(ErrorMessages::$endOtp),422);
    }

    $userReadRepository = new UserReadRepository();
    $user = $userReadRepository->find($this->userId);

    if($user == null){
        make_exception(ErrorMessages::getKey(ErrorMessages::$notExait),422);
    }



    // Output Of Logic
        return [
            "phoneNumber" => $user->phoneNumber,
            "userId" => $user->id,
        ];
    }

}
