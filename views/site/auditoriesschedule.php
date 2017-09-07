<?php
$this->title = 'Расписание аудитории';
$object = new \app\models\AuditoriesSchedule();
$object->AuditoriesDisplay();
?>
<div class="schedule_table">
    <table>

        <thead>
        <tr>
            <th>День</th>
            <th>Номер пары</th>
            <th>Преподаватель</th>
            <th>Группа</th>
            <th>Дисциплина</th>
        </tr>
        </thead>

        <tbody>
        <?$object->ScheduleDisplay();?>
        </tbody>
    </table>
</div>