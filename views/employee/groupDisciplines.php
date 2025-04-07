<div class="mainContForFormAndTitles wraper">
    <div class="contForFormCheckDisciplene">
        <form class="checkDiscipleneForm" method="post">
            <div class="contForTitleForm">
                <p class="titleMakeStudent">Выбор дисциплины</p>
            </div>
            <div class="contForCheckStudent">
                <label for="group">Группа</label>
                <select id="group" name="group">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?= $group->id ?>"
                            <?= (isset($selectedGroup) && $selectedGroup == $group->id ? 'selected' : '') ?>>
                            <?= htmlspecialchars($group->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit" class="seeDisciplene">Просмотреть</button>
            </div>
        </form>
        <div class="contForSee wraper">
            <p>Дисциплины группы</p>
            <div class="contForSeeDisciplene">
                <?php if ($disciplines->isNotEmpty()): ?>
                    <ul>
                        <?php foreach ($disciplines as $discipline): ?>
                            <li><?= htmlspecialchars($discipline->name) ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Нет данных для отображения</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>