<?php
namespace App\Repositories\Models\UserRepository;

use App\Models\User;
use App\Repositories\basic\ICreateRepository;

class UserCreateRepository implements ICreateRepository
{
    public function create ( array $data )
    {
        $user = User::create($data);
        return $user ;//?  make_exception($ErrorMessage::so):$user ;
    }
}