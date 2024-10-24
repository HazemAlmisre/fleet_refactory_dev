<?php
namespace App\Repositories\Models\UserRepository;

use App\Models\User;
use PhpParser\Node\Expr\Cast\Array_;
use App\Repositories\basic\IReadRepository;

class UserReadRepository implements IReadRepository
{
    public function isExists ($conditions)
    {
        return $user = User::where($conditions)->exists();
    }


    public function getByConditions(array $selected = ["*"] , $conditions):array {
        $user = User::select($selected)
        ->where($conditions)->get();
        return $user;
    }
    public function getByValue($column , $value):User | null {
        $user = User::where($column , $value)->first();
        return $user;
    }

    public function find(int $id , array $selected = ["*"]){
        return User::query()->select($selected)->find($id);
    }
    public function getAll(array $selected = ["*"]){return null;}

    public function getById(int $id , array $selected = ["*"]){return null;}


}
