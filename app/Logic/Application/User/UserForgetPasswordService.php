<?php
namespace App\Logic\Application\User;

use App\Const\Messages\ErrorMessages;
use App\Logic\Service;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Models\UserRepository\UserReadRepository;
use App\Repositories\Models\UserRepository\UserUpdateRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserForgetPasswordService implements Service  {
    private string $password;
    private string $code;
    private string $phoneNumber;



    public function __construct( Array $input ,
    ){
        $this->password  = $input['password'];
        $this->code  = $input['code'];
        $this->phoneNumber  = $input['phoneNumber'];
    }

    public function execute ( ): Array | Model {


    $userReadRepository = new UserReadRepository();
    $user = $userReadRepository->getByValue("phoneNumber",$this->phoneNumber);

    if($user == null){
        make_exception(ErrorMessages::getKey(ErrorMessages::$notExait),422);
    }

    $code = getCatch("user_id_".$user->id);
    if ($code == null || $code != $this->code){
        make_exception(ErrorMessages::getKey(ErrorMessages::$endOtp),422);
    }

    (new UserUpdateRepository())->update("phoneNumber",$this->phoneNumber,[
        "password" => Hash::make($this->password),
    ]);

    // Output Of Logic
        return [
        ];

    }

}
