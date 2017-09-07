<?php
$this->title = 'Расписание преподавателя';
$object = new \app\models\TeachersSchedule();
$object->SelectTeacher();
?>

<div class="schedule_table">
    <table>

        <thead>
        <tr>
            <th>День</th>
            <th>Номер пары</th>
            <th>Дисциплина</th>
            <th>Группа</th>
            <th>Аудитория</th>
        </tr>
        </thead>

        <tbody>
        <?$object->TeacherDisplay();?>
        </tbody>
    </table>
</div>