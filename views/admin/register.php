<h2>Регистрация нового сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" class="loginForm register">
    <input class="inputLogin" type="text" name="name" placeholder="Введите имя">
    <input class="inputLogin" type="text" name="login" placeholder="Введите логин">
    <input class="inputLogin" type="password" name="password" placeholder="Введите пароль">
    <button class="btnLogin">Зарегистрировать</button>
</form>