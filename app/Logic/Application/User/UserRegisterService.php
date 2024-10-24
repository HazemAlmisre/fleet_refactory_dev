<?php
namespace App\Logic\Application\User;

use Exception;
use App\Logic\Service;
use Illuminate\Support\Facades\Hash;
use App\Adapter\Response\ResponseLogic;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\Models\UserRepository\UserCreateRepository;

class UserRegisterService extends ResponseLogic implements Service  {

    private string $firstName;
    private string $lastName;
    private string $phoneNumber;
    private string $password;

    public function __construct( Array $input ,
    ){
        $this->firstName    = $input['firstName'];
        $this->lastName     = $input['lastName'];
        $this->password     = $input['password'];
        $this->phoneNumber  = $input['phoneNumber'];
        }



    public function execute ( ): Array | Model  {

        $userCreateRepository = new UserCreateRepository();

        $hashedPassword = Hash::make($this->password);

        $user = $userCreateRepository->create([
            'firstName'     =>$this->firstName,
            'lastName'      =>$this->lastName,
            'phoneNumber'   =>$this->phoneNumber,
            'password'      => $hashedPassword
        ]);

        if ($user == null)
        throw new Exception('');

        return [];

    }



}
