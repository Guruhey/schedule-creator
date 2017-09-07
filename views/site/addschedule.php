<?php

$this->title = 'Занесение расписания';
$object =  new \app\models\AddSchedule();
$object->displayHeaderForm();?>

    <div class="scheduleform">
    <div class="scheduleform_cont">
        <div class="title glyph">Добавление расписания
            <span onclick="CloseForm()" class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span>
        </div>
        <div class="separation">
            <div class="buttons">
                <div class="split_type split_type_1">Обычная неделя</div>
                <div class="split_type split_type_2">
                    <div class="left_buttons">Левая</div>
                    <div class="right_buttons">Правая</div>
                </div>
                <div class="split_type split_type_3">
                    <div class="top_buttons">Верхняя</div>
                    <div class="bot_buttons">Нижняя</div>
                </div>
                <div class="split_type split_type_4">
                    <div class="top_buttons">
                        <div class="left_buttons">Левая</div>
                        <div class="right_buttons">Правая</div>
                    </div>
                    <div class="bot_buttons">Нижняя</div>
                </div>
                <div class="split_type split_type_5">
                    <div class="top_buttons">Верхняя</div>
                    <div class="bot_buttons">
                        <div class="left_buttons">Левая</div>
                        <div class="right_buttons">Правая</div>
                    </div>
                </div>
                <div class="split_type split_type_6">
                    <div class="top_buttons">
                        <div class="left_buttons">Левая</div>
                        <div class="right_buttons">Правая</div>
                    </div>
                    <div class="bot_buttons">
                        <div class="left_buttons">Левая</div>
                        <div class="right_buttons">Правая</div>
                    </div>
                </div>
            </div>
        </div>
        <form class="forms">
            <div class="forms_cont">
                <?$object->displayContent();?>
                <?$object->addSubjectOne();?>
            </div>
            <div class="btn_cont">
                <button type="submit" name="secbutton" class="styler">Добавить</button>
                <button type="button" onclick="CloseForm()" class="styler">Закрыть</button>
            </div>
        </form>
        <div class="clear"></div>
    </div>
    </div>
    <div class="schedule_table">
        <table>

            <thead>
            <tr>
                <th>День</th>
                <th>Номер пары</th>
                <th>Дисциплина</th>
                <th>Преподаватель</th>
                <th>Аудитория</th>
            </tr>
            </thead>

            <tbody>
            <?$object->displayShchedule();?>
