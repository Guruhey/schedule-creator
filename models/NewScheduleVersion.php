<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class NewScheduleVersion extends Model
{
    public $idusp;
    public $description;
    public $year;
    public $using;
    public $date_add;
    public $group;

    public function rules()
    {
        return [
            [['description','year','date_add'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    public function oppNewScheduleVersion()
    {
        $form = new NewScheduleVersion();
        #session_start();
        $form->year = date("Y");

        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_schedule_v_form'
            ]
        ]); ?>
            <?=$f->field($form, 'year')->textInput(['class' => 'form-control'])->label('Год начала:'); ?>
            <?=$f->field($form, 'description')->textInput(['class' => 'form-control'])->label('Описание:')->textarea(['rows' => '2']) ?>
            <?=$f->field($form, 'using')->textInput(['class' => 'form-control'])->checkbox(['label' => ''])->label('Действующее расписание:'); ?>
            <?=$f->field($form, 'date_add')->textInput(['class' => 'form-control'])->label('Дата начала:')->input('date'); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <? ActiveForm::end();
            if(isset($_POST['butform']))
            {
                try
                {
                    $schedule_version = new schedule_version();
                    $schedule_version->idUsp = 1;
                    $schedule_version->description = $_POST["NewScheduleVersion"]["description"];
                    $schedule_version->year = $_POST["NewScheduleVersion"]["year"];
                    $schedule_version->using = $_POST["NewScheduleVersion"]["using"];
                    $schedule_version->date_add = $_POST["NewScheduleVersion"]["date_add"];
                    $schedule_version->save();
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