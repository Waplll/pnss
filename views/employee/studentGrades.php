<div class="mainContForFormAndTitles wraper">
    <div class="contForFormCheckDisciplene">
        <form class="checkMarkForDiscipleneAndHoursForm" method="post">
            <div class="contForTitleForm">
                <p class="titleMakeStudent">Выбор Успеваемости студента</p>
            </div>
            <div class="contForCheckDisciplene">
                <label for="checkDisciplene">Дисциплина</label>
                <select name="checkDisciplene" id="checkDisciplene">
                    <?php foreach ($disciplines as $discipline): ?>
                        <option value="<?php echo htmlspecialchars($discipline->name); ?>"
                            <?php echo (isset($selectedDiscipline) && $selectedDiscipline == $discipline->name ? 'selected' : ''); ?>>
                            <?php echo htmlspecialchars($discipline->name); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="numberCourse">
                <label for="hours">Количество часов</label>
                <select name="hours" id="hours">
                    <option value="72" <?php echo (isset($selectedHours) && $selectedHours == 72 ? 'selected' : ''); ?>>72</option>
                    <option value="80" <?php echo (isset($selectedHours) && $selectedHours == 80 ? 'selected' : ''); ?>>80</option>
                    <option value="92" <?php echo (isset($selectedHours) && $selectedHours == 92 ? 'selected' : ''); ?>>92</option>
                </select>
            </div>
            <div class="numberCourse">
                <label for="control_type">Тип контроля</label>
                <select name="control_type" id="control_type">
                    <option value="">Все</option>
                    <?php foreach ($controlTypes as $type): ?>
                        <option value="<?php echo htmlspecialchars($type); ?>"
                            <?php echo (isset($selectedControl) && $selectedControl == $type ? 'selected' : ''); ?>>
                            <?php echo htmlspecialchars($type); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit" class="seeDisciplene">Просмотреть</button>
            </div>
        </form>
        <div class="contForSee wraper">
            <p>Успеваемость студента</p>
            <div class="contForSeeDisciplene">
                <?php if (isset($results)): ?>
                    <?php if (count($results) > 0): ?>
                        <?php foreach ($results as $result): ?>
                            <div class="grade-item">
                                <?php echo htmlspecialchars($result['student']); ?> -
                                <?php echo htmlspecialchars($result['discipline']); ?> -
                                <?php echo htmlspecialchars($result['grade']); ?> -
                                <?php echo htmlspecialchars($result['hours']); ?> часов
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
