<div class="mt-3 mb-5">
    <form action="/register" method="post" novalidate class="main">
        <h2>Регистрация</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Логин (электронная почта)</label>
            <input type="text" class="form-control" id="email" name = "email">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name = "name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="confirmPassword" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>
        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <div class="mt-3">
            <a href="/login">Уже зарегистрированы? Войти</a>
        </div>
    </form>
</div>
