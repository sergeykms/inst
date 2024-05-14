<?php

namespace App\Application\Models;

use App\Application\DataBase\ConnectionDataBase;

class User extends Model
{
    protected string $email;
    protected string $name;
    protected string $password;


    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

}