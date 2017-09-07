<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class TeachersSchedule extends Model
{
    public $teacher;

    public function rules()
    {
        return [];
    }
    public function SelectTeacher()
    {
        $form =  new TeachersSchedule();
        #session_start();
        $form->teacher = isset($_POST['TeachersSchedule']['teacher']) ? $_POST['TeachersSchedule']['teacher'] : '';?>

        <div class="schedule_container teach_sched">
            <?php $f = ActiveForm::begin(['id' => '',]); ?>
            <div id="group">
                <?='<div class="title">Преподаватель</div>' ?>
                <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher ORDER BY `last_name`')->indexBy('idTeacher')->column(), ['prompt'=>''])->label('')?>
            </div>
            <div class="bnt_cnt">
                <?=Html::submitButton('Показать', ['name '=> 'butform', 'class' => 'styler']); ?>
            </div>
            <?php ActiveForm::end();?>
        </div>
        <?
    }
    public function TeacherDisplay()
    {
        $db = Yii::$app->db;
        $result = $db->createCommand('SELECT concat(t.first_name, \' \', t.middle_name, \' \',  t.last_name) fio, su.name sbj, s.auditory aud, s.week_day wd, s.type, s.lesson_number ln, g.name gr  FROM `schedule` s INNER JOIN `group` g ON s.idGroup = g.idGroup INNER JOIN `teacher` t ON s.idTeacher = t.idTeacher INNER JOIN `subject` su ON s.idSubject = su.idSubject INNER JOIN `schedule_version` sv ON sv.using = sv.using WHERE sv.using = "1" AND s.idTeacher ="'.$_POST['TeachersSchedule']['teacher'].'"')->queryAll();

        if(isset($_POST['butform']))
        {
            $schedule = array();
            foreach ($result as $res)
            {
                if (!isset($schedule[$res['wd']]))
                {
                    $schedule[$res['wd']] = array();
                }
                if ($res['type'] == 1)
                {
                    $schedule[$res['wd']][$res['ln']]['type'] = 1;
                    $schedule[$res['wd']][$res['ln']][] = array("gr" => $res['gr'], "sbj" => $res['sbj'], "aud" => $res['aud']);
                }
                if ($res['type'] == 2)
                {
                    $schedule[$res['wd']][$res['ln']]['type'] = 2;
                    $schedule[$res['wd']][$res['ln']][] = array("gr" => $res['gr'], "sbj" => $res['sbj'], "aud" => $res['aud']);
                }
            }
        }
        $arr = ['Понедельник', 'Вторник','Среда','Четверг','Пятница'];
        $pars = 5;
        $weekday = 0;
        foreach ($arr as $day)
        {
            $weekday++;
            echo "<tr>
            <td rowspan=\"" . ($pars + 1) . "\">$day</td>";
            for ($i = 1; $i <= $pars; $i++)
            {
                $addclass = $i == $pars ? 'class="last_lesson"' : '';
                if($schedule[$weekday][$i]['type'] == 1)
                {
                    echo "</tr>
                        <tr onclick=\"ScheduleForm()\" $addclass >
                        <td>$i</td>
                        <td>".$schedule[$weekday][$i][0]["sbj"]."</td>
                        <td>".$schedule[$weekday][$i][0]["gr"]."</td>
                        <td>".$schedule[$weekday][$i][0]["aud"]."</td>
                        </tr>";
                }

                elseif($schedule[$weekday][$i]['type'] == 2)
                {
                    echo "</tr>
                        <tr onclick=\"ScheduleForm()\" $addclass >
                        <td>$i</td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["sbj"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["sbj"]."</div>
                        </td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["gr"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["gr"]."</div>
                        </td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["aud"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["aud"]."</div>
                        </td>
                        </tr>";
                }
                else
                {
                    echo "</tr>
                        <tr onclick=\"ScheduleForm()\" $addclass >
                        <td>$i</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>";
                }
            }
        }
    }
}
