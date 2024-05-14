<?php

use App\Application\Views\View;

?>

<!doctype html>
<html lang="ru">
<?php View::renderComponents('head'); ?>
<body>
<div class="container">
    <div class="alert alert-danger mt-3" role="alert">
        Error 404! Page not found!
    </div>
</div>
</body>
<?php View::renderComponents('script'); ?>

</html>