<?php
session_start();
$this->title = 'Расписание аудитории';
$form->auditory = isset($_POST['AuditoriesSchedule']['auditory']) ? $_POST['AuditoriesSchedule']['auditory'] : '';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
?>
<?php
$db = Yii::$app->db;
$result = $db->createCommand('SELECT concat(t.first_name, \' \', t.middle_name, \' \',  t.last_name) fio, su.name sbj, s.auditory aud, s.week_day wd, s.type, s.lesson_number ln, g.name gr  FROM `schedule` s INNER JOIN `group` g ON s.idGroup = g.idGroup INNER JOIN `teacher` t ON s.idTeacher = t.idTeacher INNER JOIN `subject` su ON s.idSubject = su.idSubject WHERE s.idVersion = (SELECT idVersion FROM schedule_version WHERE `using` = 1) AND s.auditory ="'.$_POST['AuditoriesSchedule']['auditory'].'"')->queryAll();
?>
<div class="schedule_container">
    <?php
    $f = ActiveForm::begin(['id' => '',]);
    ?>
    <div id="group">
        <?= '<div class="title">Группа</div>' ?>
        <?=$f->field($form, 'group')->dropdownList(\app\models\group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>''])->label(''); ?>
    </div>
    <div class="bnt_cnt">
        <?= Html::submitButton('Показать', ['name '=> 'butform', 'class' => 'styler']); ?>
    </div>
    <?php
    ActiveForm::end();
    ?>
</div>
