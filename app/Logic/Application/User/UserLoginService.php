<?php
namespace App\Logic\Application\User;

use App\Logic\Service;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Models\UserRepository\UserReadRepository;


class UserLoginService implements Service  {

    private string $phoneNumber;
    private string $password;


    public function __construct( Array $input ,
    ){
        $this->password     = $input['password'];
        $this->phoneNumber  = $input['phoneNumber'];
        }



    public function execute ( ): Array | Model {

    $userReadRepository = new UserReadRepository();
    $user = $userReadRepository->getByValue( 'phoneNumber' , $this->phoneNumber);

    if($user == null) make_exception('account not exists');

    if (!checkPassword($this->password , $user->password ))
    make_exception('ss');

    $token = getToken($user);


    // Output Of Logic
        return [
            'firstName'     => $user->firstName,
            'lastName'      => $user->lastName,
            'phoneNumber'   => $user->phoneNumber,
            'token'         => $token
        ];
    }
}