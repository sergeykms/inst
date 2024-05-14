<div class="mt-3 mb-5">
    <form action="/login" method="post" novalidate>
        <h2>Авторизация</h2>
        <div class="mb-3">
            <label for="email" class="form-label">Логин (электронная почта)</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
        <div class="mt-3">
            <a href="/register">Еще не зарегистрированы? Зарегистрироваться</a>
        </div>
    </form>
</div>
