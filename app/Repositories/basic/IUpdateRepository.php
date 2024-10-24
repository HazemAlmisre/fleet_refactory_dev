<?php
namespace App\Repositories\basic;


interface IUpdateRepository {
    public function update ($key,$value,array $data);
}

