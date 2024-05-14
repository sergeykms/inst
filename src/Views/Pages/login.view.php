<?php

use App\Application\Views\View;
use App\Services\Services;
if (isset($_COOKIE['jwt'])) {
    Services::goTo("/");
}
?>

<main class="container">
    <?php View::renderSections('login'); ?>
</main>
