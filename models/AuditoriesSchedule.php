<?php


namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class AuditoriesSchedule extends Model
{
    public $auditory;

    public function rules()
    {
        return [];
    }

    public function AuditoriesDisplay()
    {
        $form = new AuditoriesSchedule();
        $data = \Yii::$app->request->post('AuditoriesSchedule', []);
        $form->auditory = isset($data['auditory']) ? $data['auditory'] : null;
        //$form->auditory = isset($_POST['AuditoriesSchedule']['auditory']) ? $_POST['AuditoriesSchedule']['auditory'] : '';
        ?>

        <div class="schedule_container">
            <?php
            $f = ActiveForm::begin(['id' => '',]);
            ?>
            <div id="group">
                <?= '<div class="title">Аудитория</div>' ?>
                <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('name')->column(), ['prompt'=>''])->label(''); ?>
            </div>
            <div class="bnt_cnt">
                <?= Html::submitButton('Показать', ['name '=> 'butform', 'class' => 'styler']); ?>
            </div>
            <?php
            ActiveForm::end();
            ?>
        </div>
        <?
    }
    public function ScheduleDisplay()
    {
        $db = Yii::$app->db;
        $result = $db->createCommand('SELECT concat(t.first_name, \' \', t.middle_name, \' \',  t.last_name) fio, su.name sbj, s.auditory aud, s.week_day wd, s.type, s.lesson_number ln, g.name gr  FROM `schedule` s INNER JOIN `group` g ON s.idGroup = g.idGroup INNER JOIN `teacher` t ON s.idTeacher = t.idTeacher INNER JOIN `subject` su ON s.idSubject = su.idSubject WHERE s.idVersion = (SELECT idVersion FROM schedule_version WHERE `using` = 1) AND s.auditory ="'.$_POST['AuditoriesSchedule']['auditory'].'"')->queryAll();

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
                    $schedule[$res['wd']][$res['ln']][] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "gr" => $res['gr']);
                }
                if ($res['type'] == 2)
                {
                    $schedule[$res['wd']][$res['ln']]['type'] = 2;
                    $schedule[$res['wd']][$res['ln']][] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "gr" => $res['gr']);
                }
                if ($res['type'] == 3)
                {
                    $schedule[$res['wd']][$res['ln']]['type'] = 3;
                    $schedule[$res['wd']][$res['ln']][] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "gr" => $res['gr']);
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
                        <td>".$schedule[$weekday][$i][0]["fio"]."</td>
                        <td>".$schedule[$weekday][$i][0]["gr"]."</td>
                        <td>".$schedule[$weekday][$i][0]["sbj"]."</td>
                        </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 2)
                {
                    echo "</tr>
                        <tr onclick=\"ScheduleForm()\" $addclass >
                        <td>$i</td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["fio"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["fio"]."</div>
                        </td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["gr"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["gr"]."</div>
                        </td>
                        <td>
                            <div class=\"under\">".$schedule[$weekday][$i][0]["sbj"]."</div>
                            <div class=\"below\">".$schedule[$weekday][$i][1]["sbj"]."</div>
                        </td>
                        </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 3)
                {
                    echo "</tr>
                        <tr onclick=\"ScheduleForm()\" $addclass >
                        <td>$i</td>
                        <td>
                            <div class=\"left\">".$schedule[$weekday][$i][0]["sbj"]."</div>
                            <div class=\"right\">".$schedule[$weekday][$i][0]["sbj"]."</div>
                        </td>
                        <td>
                            <div class=\"left\">".$schedule[$weekday][$i][0]["fio"]."</div>
                            <div class=\"right\">".$schedule[$weekday][$i][0]["fio"]."</div>
                        </td>
                        <td>
                            <div class=\"left\">".$schedule[$weekday][$i][0]["aud"]."</div>
                            <div class=\"right\">".$schedule[$weekday][$i][0]["aud"]."</div>
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
