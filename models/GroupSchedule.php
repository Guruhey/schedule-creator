<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class GroupSchedule extends Model
{
    public $group;

    public function rules()
    {
        return [];
    }
    public function SelectGroup()
    {
        $form = new GroupSchedule();
        #session_start();
        $form->group = isset($_POST['GroupSchedule']['group']) ? $_POST['GroupSchedule']['group'] : ''; ?>
        <div class="schedule_container">
            <? $f = ActiveForm::begin(['id' => '',]); ?>
            <div id="group">
                <?='<div class="title">Группа</div>' ?>
                <?=$f->field($form, 'group')->dropdownList(group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>''])->label(''); ?>
            </div>
            <div class="bnt_cnt">
                <?=Html::submitButton('Показать', ['name '=> 'butform', 'class' => 'styler']); ?>
            </div>
            <? ActiveForm::end();?>
        </div>
        <?
    }

    public function ScheduleDisplay()
    {
        $db = Yii::$app->db;
        $result = $db->createCommand('SELECT concat(t.first_name, \' \', t.middle_name, \' \',  t.last_name) fio, su.name sbj, s.auditory aud, s.week_day wd, s.type, s.lesson_number ln  FROM `schedule` s INNER JOIN `group` g ON s.idGroup = g.idGroup INNER JOIN `teacher` t ON s.idTeacher = t.idTeacher INNER JOIN `subject` su ON s.idSubject = su.idSubject INNER JOIN `schedule_version` sv ON sv.using = sv.using WHERE sv.using = "1" AND s.idGroup="'.$_POST['GroupSchedule']['group'].'"')->queryAll();

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
                    $schedule[$res['wd']][$res['ln']][] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "aud" => $res['aud']);
                }
                if ($res['type'] == 2)
                {
                    $schedule[$res['wd']][$res['ln']]['type'] = 2;
                    $schedule[$res['wd']][$res['ln']][] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "aud" => $res['aud']);
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
                        <td>".$schedule[$weekday][$i][0]["fio"]."</td>
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
                            <div class=\"under\">".$schedule[$weekday][$i][0]["fio"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["fio"]."</div>
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