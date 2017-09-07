<?php
$this->title = 'Расписание группы';
$object = new \app\models\GroupSchedule();
$object->SelectGroup();
?>

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
        <?$object->ScheduleDisplay();?>
        </tbody>
    </table>
</div>