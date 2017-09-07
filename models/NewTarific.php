<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\db\Exception;

class NewTarific extends Model
{
    public $subject;
    public $group;
    public $teacher;
    public $year;

    public function rules()
    {
        return [
            [['subject','group','teacher','year'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }

    public function oppNewTarific()
    {
        $form =  new NewTarific();
        #session_start();
        $form->year = date("Y");

        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin([
                'options' => [
                    'class' => 'new_tarific_form'
                ]
            ]); ?>
            <?=$f->field($form, 'subject')->dropdownList(subject::find()->select(['name', 'idSubject'])->indexBy('idSubject')->column(), ['prompt'=>''])->label('Предмет:'); ?>
            <?=$f->field($form, 'group')->dropdownList(group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>''])->label('Группа:'); ?>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher ORDER BY last_name')->indexBy('idTeacher')->column(), ['prompt'=>''])->label('Преподаватель:')?>
            <?= $f->field($form, 'year')->textInput(['class' => 'styler'])->label('Год:') ?>
            <?='<div class="bottom_container">'?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div></div>';?>
            <?php ActiveForm::end();
            //Какая-то таблица, не помню зачем она?>
            <!--<table border="3" id="nagrTable" width="100%" style="position:absolute; top:50px; width:100%; left:0; right:0; border-collapse:collapse; ">
            <tr>
                <td colspan="14">Нагрузки преподавателя: Аржаков за 2015 год </td>
            </tr>
            <tr>
                <td rowspan="2">Код дисциплины</td>
                <td rowspan="2">Название дисциплины</td>
                <td rowspan="2">Группа</td>
                <td rowspan="2">Нагрузка</td>
                <td colspan="6"> Из них в текущем году</td>
                <td colspan="2">Часов в неделю</td>
                <td colspan="2">Контроль</td>
            </tr>
            <tr>
                <td>Всего</td>
                <td>Теоритические</td>
                <td>Лабораторные</td>
                <td>Консультации</td>
                <td>Экзамен</td>
                <td>Курсовые</td>
                <td>Осень</td>
                <td>Весна</td>
                <td>Осень</td>
                <td>Весна</td>
            </tr>
            <tr>
                <td>МДК 02.01 р.1</td>
                <td>МДК 02.01 Раздел 1.</td>
                <td>ИС-41</td>
                <td>103</td>
                <td>95</td>
                <td>30</td>
                <td>65</td>
                <td>8</td>
                <td>0</td>
                <td>0</td>
                <td>5</td>
                <td>5</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>МДК 02.01 р.2</td>
                <td>МДК 02.01 Раздел 2.</td>
                <td>ИС-41</td>
                <td>99</td>
                <td>95</td>
                <td>30</td>
                <td>65</td>
                <td>4</td>
                <td>0</td>
                <td>0</td>
                <td>5</td>
                <td>5</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>ОП.07</td>
                <td>Операционные системы и среды</td>
                <td>ТП-232</td>
                <td>84</td>
                <td>80</td>
                <td>40</td>
                <td>40</td>
                <td>4</td>
                <td>0</td>
                <td>0</td>
                <td></td>
                <td>4</td>
                <td>Диф. зачёт</td>
                <td></td>
            </tr>
            <tr>
                <td>ОП.10*</td>
                <td>Основы алгоритмизации и программирования</td>
                <td>ТП-232</td>
                <td>102</td>
                <td>64</td>
                <td>26</td>
                <td>38</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>2+2пр</td>
                <td></td>
                <td></td>
                <td>Диф. зачёт</td>
            </tr>
            <tr>
                <td colspan="3">Итого</td>
                <td>388</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>16</td>
                <td>14</td>
                <td></td>
                <td></td>
            </tr>
        </table>-->

            <? if(isset($_POST['butform']))
            {
                try
                {
                    $subject = new subject_in_group();
                    $subject->idSubject = $_POST["NewTarific"]["subject"];
                    $subject->idGroup = $_POST["NewTarific"]["group"];
                    $subject->idTeacher = $_POST["NewTarific"]["teacher"];
                    $subject->year = $_POST["NewTarific"]["year"];
                    $subject->save();
                    echo '<div class="success_add">Добавление прошло успешно</div>';
                }
                catch(Exception $e)
                {
                    echo '<div style="color:red;font-size: 20px;">Something went wrong</div>';
                }
            }
        }
        else
        {
            echo 'Доступ неавторезированным пользователям запрещен!';
        }
    }
}