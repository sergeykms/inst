<?php

namespace App\Application\Route;

class Route
{
    private static array $routs;

    // добавление роутов в массив
    public static function page(string $uri, string $controller, string $views, array $params = []): void
    {
        self::$routs[] = [
            'uri' => $uri,
            'typeRoute' => 'page',
            'controller' => $controller,
            'views' => $views,
            'params' => $params,
        ];
    }

    public static function actions(string $uri, string $controller, string $actions, array $params): void
    {
        self::$routs[] = [
            'uri' => $uri,
            'typeRoute' => 'post',
            'controller' => $controller,
            'actions' => $actions,
            'params' => $params,
        ];
    }

    public static function getRoutes(): array
    {
        return self::$routs;
    }

}