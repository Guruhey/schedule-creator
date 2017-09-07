<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;


class AddSchedule extends Model
{
    public $group;
    public $description;
    public $schedule;
    public $teacher;
    public $idcurator;
    public $subject;
    public $auditory;


    public function rules()
    {
        return [];
    }

    public function displayHeaderForm()
    {
        $form = new AddSchedule();
        $data = \Yii::$app->request->post('AddSchedule', []);
        $form->description = isset($data['description']) ? $data['description'] : null;
        $form->group = isset($data['group']) ? $data['group'] : null;

        if (isset($_SESSION['logged_user']))
        {?>
            <div class="schedule_container">
            <? $f = ActiveForm::begin(['id' => '',]); ?>
            <div id="group">
                <?= '<div class="title">Группа</div>' ?>
                <?= $f->field($form, 'group')->dropdownList(group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt' => ''])->label(''); ?>
            </div>
            <div id="version">
                <?= '<div class="title">Версия расписания</div>' ?>
                <?= $f->field($form, 'description')->dropdownList(schedule_version::find()->select(['description', 'IdVersion'])->indexBy('IdVersion')->column(), ['prompt' => ''])->label(''); ?>
            </div>
            <div class="bnt_cnt">
                <?= '<a href="administration">Назад</a>' ?>
                <?= Html::submitButton('Показать', ['name ' => 'butform','id'=>'butform', 'class' => 'styler']); ?>
            </div>
            <?php ActiveForm::end(); ?>
            </div><?
        }
        else
        {
            echo 'Доступ неавторезированным пользователям запрещен!';
        }
    }

    public function displayContent()
    {
        $form =  new AddSchedule();
        $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_form_form'
            ]
        ]);?>

        <div class="cont">
            <div class="label">Преподаватель</div>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT DISTINCT concat(`last_name`, " " , `first_name`, " ", `middle_name`), t.`idTeacher` FROM teacher t INNER JOIN `subject_in_group` sig ON t.idTeacher = sig.idTeacher WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idTeacher')->column(), ['prompt'=>'','name' =>'teacher1'])->label('')?>
            <br>
            <div class="label">Предмет</div>
            <?=$f->field($form, 'subject')->dropdownList(subject::findBySql('SELECT DISTINCT s.`name`, s.`idSubject` FROM subject s INNER JOIN `subject_in_group` sig ON s.idSubject = sig.idSubject WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idSubject')->column(), ['prompt'=>'','name' =>'subject1'])->label('')?>
            <br>
            <div class="label">Аудитория</div>
            <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('idAuditory')->column(), ['prompt'=>'','name' =>'auditory1'])->label(''); ?>
        </div>
        <div class="cont">
            <div class="label">Преподаватель</div>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT DISTINCT concat(`last_name`, " " , `first_name`, " ", `middle_name`), t.`idTeacher` FROM teacher t INNER JOIN `subject_in_group` sig ON t.idTeacher = sig.idTeacher WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idTeacher')->column(), ['prompt'=>'','name' =>'teacher2'])->label('')?>
            <br>
            <div class="label">Предмет</div>
            <?=$f->field($form, 'subject')->dropdownList(subject::findBySql('SELECT DISTINCT s.`name`, s.`idSubject` FROM subject s INNER JOIN `subject_in_group` sig ON s.idSubject = sig.idSubject WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idSubject')->column(), ['prompt'=>'','name' =>'subject2'])->label('')?>
            <br>
            <div class="label">Аудитория</div>
            <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('idAuditory')->column(), ['prompt'=>'','name' =>'auditory2'])->label(''); ?>
        </div>
        <div class="cont">
            <div class="label">Преподаватель</div>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT DISTINCT concat(`last_name`, " " , `first_name`, " ", `middle_name`), t.`idTeacher` FROM teacher t INNER JOIN `subject_in_group` sig ON t.idTeacher = sig.idTeacher WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idTeacher')->column(), ['prompt'=>'','name' =>'teacher3'])->label('')?>
            <br>
            <div class="label">Предмет</div>
            <?=$f->field($form, 'subject')->dropdownList(subject::findBySql('SELECT DISTINCT s.`name`, s.`idSubject` FROM subject s INNER JOIN `subject_in_group` sig ON s.idSubject = sig.idSubject WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idSubject')->column(), ['prompt'=>'','name' =>'subject3'])->label('')?>
            <br>
            <div class="label">Аудитория</div>
            <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('idAuditory')->column(), ['prompt'=>'','name' =>'auditory3'])->label(''); ?>
        </div>
        <div class="cont">
            <div class="label">Преподаватель</div>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT DISTINCT concat(`last_name`, " " , `first_name`, " ", `middle_name`), t.`idTeacher` FROM teacher t INNER JOIN `subject_in_group` sig ON t.idTeacher = sig.idTeacher WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idTeacher')->column(), ['prompt'=>'','name' =>'teacher4'])->label('')?>
            <br>
            <div class="label">Предмет</div>
            <?=$f->field($form, 'subject')->dropdownList(subject::findBySql('SELECT DISTINCT s.`name`, s.`idSubject` FROM subject s INNER JOIN `subject_in_group` sig ON s.idSubject = sig.idSubject WHERE sig.idGroup = \''.$_POST['AddSchedule']['group'].'\' AND sig.year = (SELECT year FROM `schedule_version` WHERE IdVersion = \''.$_POST['AddSchedule']['description'].'\')')->indexBy('idSubject')->column(), ['prompt'=>'','name' =>'subject4'])->label('')?>
            <br>
            <div class="label">Аудитория</div>
            <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('idAuditory')->column(), ['prompt'=>'','name' =>'auditory4'])->label('');?>
        </div>
        <div class="btn_cont">
            <?= '<a href="administration">Назад</a>' ?>
            <?= Html::submitButton('Показать', ['name ' => 'secbutton','id'=>'secbutton', 'class' => 'styler']); ?>
        </div>
        <?ActiveForm::end();?>
<?
    }

    public function displayShchedule()
    {
        $db = Yii::$app->db;
        $result = $db->createCommand('SELECT concat(t.first_name, \' \', t.middle_name, \' \',  t.last_name) fio, su.name sbj, s.auditory aud, s.week_day wd, s.type, s.lesson_number ln, s.order  FROM `schedule` s INNER JOIN `group` g ON s.idGroup = g.idGroup INNER JOIN `teacher` t ON s.idTeacher = t.idTeacher INNER JOIN `subject` su ON s.idSubject = su.idSubject WHERE s.idVersion="' . $_POST['AddSchedule']['description'] . '" AND s.idGroup="' . $_POST['AddSchedule']['group'] . '"')->queryAll();

        if (isset($_POST['AddSchedule']['description']) and isset($_POST['AddSchedule']['group']))
            $fillallay = "ScheduleForm()";
        else
            $fillallay = "";
        if(isset($_POST['butform']))
        {
            $schedule = array();
            foreach ($result as $res)
            {
                if (!isset($schedule[$res['wd']]))
                {
                    $schedule[$res['wd']] = array();
                }
                $schedule[$res['wd']][$res['ln']]['type'] = $res['type'];
                $schedule[$res['wd']][$res['ln']][$res['order']] = array("fio" => $res['fio'], "sbj" => $res['sbj'], "aud" => $res['aud']);
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
                                    <tr onclick=\"$fillallay\" $addclass >
                                    <td>$i</td>
                                    <td>".$schedule[$weekday][$i][1]["sbj"]."</td>
                                    <td>".$schedule[$weekday][$i][1]["fio"]."</td>
                                    <td>".$schedule[$weekday][$i][1]["aud"]."</td>
                                    </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 2)
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                    <td>$i</td>
                                    <td>
                                        <div class='split'>
                                            <div class=\"left\">".$schedule[$weekday][$i][1]["sbj"]."</div>
                                            <div class=\"right\">".$schedule[$weekday][$i][2]["sbj"]."</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='split'>
                                            <div class=\"left\">".$schedule[$weekday][$i][1]["fio"]."</div>
                                            <div class=\"right\">".$schedule[$weekday][$i][2]["fio"]."</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class='split'>
                                            <div class=\"left\">".$schedule[$weekday][$i][1]["aud"]."</div>
                                            <div class=\"right\">".$schedule[$weekday][$i][2]["aud"]."</div>
                                        </div>
                                    </td>
                                    </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 3)
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                    <td>$i</td>
                                    <td>
                                        <div class=\"under\">".$schedule[$weekday][$i][1]["sbj"]."</div>
                                        <div class=\"below\">".$schedule[$weekday][$i][2]["sbj"]."</div>
                                    </td>
                                    <td>
                                        <div class=\"under\">".$schedule[$weekday][$i][1]["fio"]."</div>
                                        <div class=\"below\">".$schedule[$weekday][$i][2]["fio"]."</div>
                                    </td>
                                    <td>
                                        <div class=\"under\">".$schedule[$weekday][$i][1]["aud"]."</div>
                                        <div class=\"below\">".$schedule[$weekday][$i][2]["aud"]."</div>
                                    </td>
                                    </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 4)
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                        <td>$i</td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["sbj"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["sbj"]."</div>
                                            </div>
                                            <div class=\"below\">".$schedule[$weekday][$i][3]["sbj"]."</div>
                                        </td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["fio"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["fio"]."</div>
                                            </div>
                                            <div class=\"below\">".$schedule[$weekday][$i][3]["fio"]."</div>
                                        </td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["aud"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["aud"]."</div>
                                            </div>
                                            <div class=\"below\">".$schedule[$weekday][$i][3]["aud"]."</div>
                                        </td>
                                    </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 5)
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                        <td>$i</td>
                                        <td>
                                            <div class=\"under\">".$schedule[$weekday][$i][1]["sbj"]."</div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][2]["sbj"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][3]["sbj"]."</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=\"under\">".$schedule[$weekday][$i][1]["fio"]."</div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][2]["fio"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][3]["fio"]."</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=\"under\">".$schedule[$weekday][$i][1]["aud"]."</div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][2]["aud"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][3]["aud"]."</div>
                                            </div>
                                        </td>
                                    </tr>";
                }
                elseif($schedule[$weekday][$i]['type'] == 6)
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                        <td>$i</td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["sbj"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["sbj"]."</div>
                                            </div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][3]["sbj"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][4]["sbj"]."</div>
                                            </div> 
                                        </td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["fio"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["fio"]."</div>
                                            </div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][3]["fio"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][4]["fio"]."</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class=\"under\">
                                                <div class='left'>".$schedule[$weekday][$i][1]["aud"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][2]["aud"]."</div>
                                            </div>
                                            <div class=\"below\">
                                                <div class='left'>".$schedule[$weekday][$i][3]["aud"]."</div>
                                                <div class='right'>".$schedule[$weekday][$i][4]["aud"]."</div>
                                            </div>
                                        </td>
                                    </tr>";
                }
                else
                {
                    echo "</tr>
                                    <tr onclick=\"$fillallay\" $addclass >
                                    <td>$i</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    </tr>";
                }
            }
        }
        ?>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                var chgr = 0;
                var chds = 0;
                $("#butform").prop( "disabled", true );
                $("#addschedule-group").bind("change", function () {
                    chgr++;
                    if(chds!=0)
                    {
                        $("#butform").prop( "disabled", false );
                    }
                });
                $("#addschedule-description").bind("change", function () {
                    chds++;
                    if(chgr!=0)
                    {
                        $("#butform").prop( "disabled", false );
                    }
                });
            });
        </script>
        </tbody>
        </table>
        </div>
        <?
    }
    public function addSubjectOne()
    {
        var_dump($_POST);
        if(isset($_POST['secbutton']))
        {
            var_dump($_POST);
        }
    }
}