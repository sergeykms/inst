<?php

namespace App\Application\Router;

trait RouterHelpers
{
    protected static function filterRouters(array $routes, string $typeRoutes): array
    {
        return array_filter($routes, function ($route) use ($typeRoutes) {
            return $route['typeRoute'] === $typeRoutes;
        });
    }

}