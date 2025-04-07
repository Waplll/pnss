<div class="contForMakeGroupForm wraper">
    <form class="makeGroupForm" method="post">
        <div class="contForTitleForm">
            <p class="titleMakeStudent">Создание дисциплины</p>
        </div>
        <div class="contForInputMakeGroup">
            <label for="makeGroup">Введите название дисциплины</label>
            <input class="inputMakeDisciplene" type="text" id="makeGroup" name="makeGroup"
                   value="<?= htmlspecialchars($oldName ?? '') ?>"
                   pattern="[А-Яа-яЁё\s\-]{2,100}"
                   title="Только русские буквы, пробелы и дефисы (2-100 символов)"
                   required>
            <?php if (!empty($error)): ?>
                <div class="error-message"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
        <div>
            <button class="btnMakeGroup">Создать</button>
        </div>
    </form>
</div>
