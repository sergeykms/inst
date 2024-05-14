<?php

namespace App\Controllers;

use App\Application\Actions\ActionsUser;
use App\Services\Services;

class UserController
{
    public function registerUser(): void
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        ActionsUser::registerUser(['email' => $email, 'name' => $name, 'password' => $password]);
    }

    public function loginUser(): void
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        ActionsUser::loginUser(['email' => $email, 'password' => $password]);
    }

    public function logoutUser(): void
    {
        Services::unsetCookie('jwt');
        Services::unsetCookie('userId');
        Services::unsetCookie('userName');
        Services::goTo('/');
    }
}