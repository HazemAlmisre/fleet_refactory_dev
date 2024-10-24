<?php
namespace App\Logic\Application\User;

use App\Const\Messages\ErrorMessages;
use App\Logic\Service;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Models\UserRepository\UserReadRepository;
use Illuminate\Support\Facades\Http;

class UserSendOtpService implements Service  {

    private string $phoneNumber;


    public function __construct( Array $input
    ){
        $this->phoneNumber  = $input['phoneNumber'];
    }



    public function execute ( ): Array | Model {

    $userReadRepository = new UserReadRepository();
    $user = $userReadRepository->getByValue( 'phoneNumber' , $this->phoneNumber);

    if($user == null){
        make_exception(ErrorMessages::getKey(ErrorMessages::$notExait));
    }

    $otpCode = rand(100000, 999999);


    $response = Http::get('https://services.mtnsyr.com:7443/General/MTNSERVICES/ConcatenatedSender.aspx?User=uom424&Pass=mar141214&From=Fleet App&Gsm='.$this->phoneNumber.'&Msg='.$otpCode.' Is your FleetApp verification code&Lang=1');

    info($otpCode);
    setCatch("user_id_".$user->id , $otpCode);
    // Output Of Logic
        return [
            "phoneNumber" => $this->phoneNumber,
            "userId" => $user->id
        ];
    }
}
