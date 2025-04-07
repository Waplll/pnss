<div class="contForMakeGroupForm wraper">
    <form class="makeGroupForm"  method="post">
        <div class="contForTitleForm">
            <p class="titleMakeStudent">Создание группы</p>
        </div>
        <div class="contForInputMakeGroup">
            <label for="makeGroup">Введите номер группы</label>
            <input class="inputMakeGroup" type="text" id="makeGroup" name="name"
                   value="<?= htmlspecialchars($oldName ?? '') ?>"
                   pattern="\d{3,4}"
                   title="Введите от 3 до 4 цифр"
                   required>
            <?php if (!empty($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
        <div>
            <button class="btnMakeGroup" type="submit">Создать</button>
        </div>
    </form>
</div>