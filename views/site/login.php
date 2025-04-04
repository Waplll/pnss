<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<?php if (!app()->auth::check()): ?>
    <form method="post" class="loginForm">
        <input class="inputLogin" type="text" name="login" placeholder="Введите ваш логин">
        <input class="inputLogin" type="password" name="password" placeholder="Введите ваш пароль">
        <button class="btnLogin">Вход</button>
    </form>
<?php endif; ?>