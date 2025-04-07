<div class="mainContForFormAndTitles wraper">
    <div class="contForFormCheckDisciplene">
        <form class="checkMarkForDiscipleneAndHoursForm" method="post">
            <div class="contForTitleForm">
                <p class="titleMakeStudent">Выбор успеваемости студентов</p>
            </div>
            <div class="contForCheckDisciplene">
                <label for="checkDisciplene">Дисциплина</label>
                <select name="checkDisciplene" id="checkDisciplene">
                    <?php foreach ($disciplines as $discipline): ?>
                        <option value="<?= htmlspecialchars($discipline->name) ?>"
                            <?= (isset($selectedDiscipline) && $selectedDiscipline == $discipline->name) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($discipline->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="numberCourse">
                <label for="group_name">Группа</label>
                <select name="group_name" id="group_name">
                    <?php foreach ($groups as $group): ?>
                        <option value="<?= htmlspecialchars($group->name) ?>"
                            <?= (isset($selectedGroup) && $selectedGroup == $group->name) ? 'selected' : '' ?>>
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
            <p>Успеваемость студентов</p>
            <div class="contForSeeDisciplene">
                <?php if (isset($results)): ?>
                    <?php if (count($results) > 0): ?>
                        <?php foreach ($results as $result): ?>
                            <div class="grade-item">
                                <?= htmlspecialchars($result['student']) ?> (Группа: <?= htmlspecialchars($result['group']) ?>) -
                                <?= htmlspecialchars($result['discipline']) ?> -
                                Оценка: <?= htmlspecialchars($result['grade']) ?> -
                                Часы: <?= htmlspecialchars($result['hours']) ?> -
                                Тип контроля: <?= htmlspecialchars($result['control_type']) ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>Нет данных для отображения</div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>