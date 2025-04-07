<div class="contForLoginUser">
    <div class="backgroundForLogin">
        <div class="loginForm register">
            <h2>Регистрация нового сотрудника</h2>
            <?php if (!empty($error)): ?>
                <h3 class="error"><?= htmlspecialchars($error) ?></h3>
            <?php endif; ?>
            <h3><?= $message ?? ''; ?></h3>
            <form method="post">
                <input class="inputLogin" type="text" name="name" placeholder="Введите имя"
                       value="<?= htmlspecialchars($old['name'] ?? '') ?>"
                       pattern="[А-Яа-яЁё\s]{2,50}"
                       title="Только русские буквы (2-50 символов)"
                       required>
                <input class="inputLogin" type="text" name="login" placeholder="Введите логин"
                       value="<?= htmlspecialchars($old['login'] ?? '') ?>"
                       pattern="[a-zA-Z0-9]{4,20}"
                       title="Только латинские буквы и цифры (4-20 символов)"
                       required>
                <input class="inputLogin" type="password" name="password" placeholder="Введите пароль (мин. 6 символов)"
                       pattern="[a-zA-Z0-9]{6,30}"
                       title="Только латинские буквы и цифры (6-30 символов)"
                       required
                       minlength="6">
                <button type="submit" class="btnLogin">Зарегистрировать</button>
            </form>
        </div>
    </div>
</div>