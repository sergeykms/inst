<?php

namespace App\Controllers;

use App\Application\Views\View;
use App\Services\Services;

class PagesController
{
    public function getViews($view, $params = []): void
    {
        try {
            // если в $params есть проверка на недоступность роута
            if (isset($params['unavailable'])) {
                // перебор массива проверок на недоступность роута
                foreach ($params['unavailable'] as $key => $value) {
                    // кука есть и значение true или если куки нет и значение проверки false то переход на роут, указанный в 'goTo'
                    if ((!$value && !isset($_COOKIE[$key])) || (isset($_COOKIE[$key]) && $value)) {
                        Services::goTo($params['goTo']);
                    } else {
                        View::renderViews($view, $params);
                    }
                }
            } else {
                // если проверки на недоступность нет
                View::renderViews($view, $params);
            }
        } catch (\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
