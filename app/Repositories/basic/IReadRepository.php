<?php
namespace App\Repositories\basic;

interface IReadRepository
{
    public function getAll(array $selected = ["*"]);

    public function getById(int $id , array $selected = ["*"]);

    public function getByConditions(array $selected = ["*"] , $conditions);


}
