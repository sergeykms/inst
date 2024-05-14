<?php

use App\Application\Views\View;
use App\Services\Services;

$auth = $_COOKIE['jwt'] ?? null; // проверка есть ли в куках jwt токен
if ($auth) {
    $checkUser = Services::isUserChecked();
    // если токен не валидный или в куках нет сохраненных данных пользователя
    if (!$checkUser) {
        Services::unsetCookie('jwt');
        Services::unsetCookie('userId');
        Services::unsetCookie('userName');
        $auth = NULL;
        Services::goTo('/login');
    }
}
$page = $params['page'] ?? '404';
?>

<!doctype html>
<html lang="ru">
<?php View::renderComponents('head'); ?>
<body>
<?php //View::renderComponents('header', ['page' => $page]); ?>
<?php View::renderComponents('header'); ?>

<main class="container">
    <?php View::renderPages($page); ?>
</main>
<?php View::renderComponents('footer'); ?>
</body>
<?php View::renderComponents('script'); ?>
</html>