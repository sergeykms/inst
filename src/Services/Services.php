<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Services
{

    public static function setCookie($nameCookie, $value): void
    {
        setcookie($nameCookie, $value, time() + 3600, '/');
    }

    public static function unsetCookie($nameCookie): void
    {
        setcookie($nameCookie, '', time() - 3600, '/');
    }

    public static function goTo($path): void
    {
        header("Location: $path");
    }

    public static function generateToken($id, $name): string
    {
        return JWT::encode(
            array(
                'data' => array(
                    'user_id' => (string)$id,
                    'user_name' => (string)$name,
                )
            ),
            $_ENV['SECRET_KEY_JWT'],
            'HS256'
        );
    }

   // проеерка авторизирован ли пользователь. если кука есть и jwt токен действителен
    public static function isUserChecked(): bool
    {
        $userId = $_COOKIE['userId'] ?? null;
        $userName = $_COOKIE['userName'] ?? null;
        $resultCheck = false;
        if ($userId && $userName) {
            try {
                $decoded = JWT::decode($_COOKIE['jwt'], new Key($_ENV['SECRET_KEY_JWT'], 'HS256'));
                $payload = json_decode(json_encode($decoded), true);
                if (isset($payload['data']['user_id']) && isset($payload['data']['user_name'])) {
                    if ($userId === $payload['data']['user_id'] && $userName === $payload['data']['user_name']) {
                        $resultCheck = true;
                    }
                }
            } catch (\Exception $exception) {
                return false;
            }
        } else {
            Services::unsetCookie('jwt');
            Services::unsetCookie('userId');
            Services::unsetCookie('userName');
        }
        return $resultCheck;
    }
}