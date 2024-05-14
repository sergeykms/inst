<?php

namespace App\Application\Actions;

use App\Application\Models\User;
use Firebase\JWT\JWT;
use App\Services\Services;

class ActionsUser
{
    public static function loginUser(array $params): void
    {
        $user = new User();
        // поиск пользлваетеля в базе
        $findUser = $user->findByField('users', 'email', $params['email']);
        if (!$findUser) {
            echo 'Пользователь не найден';
        } elseif (password_verify($params['password'], $findUser['password'])) {
            $token = Services::generateToken($findUser['id'], $findUser['name']);
            Services::setCookie('jwt', $token);
            Services::setCookie('userId', $findUser['id']);
            Services::setCookie('userName', $findUser['name']);
            Services::goTo('/home');
        } else {
            echo 'Неверный пароль';
        }
    }

    public static function registerUser(array $params): void
    {
        $user = new User();
        $user->insertToBD('users', $params);
        Services::goTo('/login');
    }
}