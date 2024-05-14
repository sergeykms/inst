<div class="mt-3 mb-5">
    <form action="/sendContacts" method="post" novalidate>
        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <input type="text" class="form-control" id="message" name="message">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
