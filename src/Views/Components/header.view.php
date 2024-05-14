<?php
$page = $params['page'] ?? false; // $params приходит из routes

$auth = $_COOKIE['jwt'] ?? null;

?>

<header class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Логотип</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $page === 'home' ? 'active' : '' ?>"
                           aria-current="page" href="/home">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page === 'about' ? 'active' : '' ?>"
                           aria-current="page" href="/about">О нас</a>
                    </li>
                </ul>
                <a href="/login" class="btn btn-outline-success <?php echo $auth ? 'hide_element' : '' ?>">Войти</a>
                <form class="d-flex" action="/logout" method="post">
                    <button class="btn btn-outline-success <?php echo !$auth ? 'hide_element' : '' ?>" type="submit">
                        Выйти
                    </button>
                </form>
            </div>
        </div>
    </nav>
</header>

