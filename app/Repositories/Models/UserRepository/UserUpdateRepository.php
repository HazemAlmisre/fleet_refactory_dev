<?php
namespace App\Repositories\Models\UserRepository;

use App\Models\User;
use App\Repositories\basic\IUpdateRepository;

class UserUpdateRepository implements IUpdateRepository
{

    public function update($key,$value,array $data)
    {
        User::query()->where($key,$value)->update($data);
    }

}
