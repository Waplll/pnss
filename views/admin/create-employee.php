<h2>Регистрация сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>

<form method="post">
    <label>Имя: <input type="text" name="name" required></label>
    <label>Логин: <input type="text" name="login" required></label>
    <label>Пароль: <input type="password" name="password" required></label>
    <button type="submit">Зарегистрировать</button>
</form>