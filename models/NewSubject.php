<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class NewSubject extends Model
{
    public $idsubject;
    public $name;
    public $meta_name;
    public $code;
    public $hour_all;
    public $hour_aud;
    public $hour_lab;
    public $hour_kurs;
    public $hour_kons;
    public $hour_exam;
    public $split_lab;
    public $split_kurs;
    public $count_hs_aud;
    public $count_hs_lab;
    public $count_hs_kurs;
    public $count_ha_aud;
    public $count_ha_lab;
    public $count_ha_kurs;
    public $term_check_s;
    public $term_check_a;

    public function rules()
    {
        return [
            [['idsubject','name','meta_name','code','hour_all','hour_aud','hour_lab','hour_kurs','hour_kons','hour_exam','split_lab','split_kurs','count_hs_aud','count_hs_lab','count_hs_kurs','count_ha_aud','count_ha_lab','count_ha_kurs','term_check_s','term_check_a'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    public function oppNewSubject()
    {
        $form = new NewSubject();
        #session_start();

        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_subject_form'
            ]
        ])?>
            <?=$f->field($form, 'name')->textInput(['class' => 'form-control'])->label('Название дисциплины:');?>
            <?=$f->field($form, 'meta_name')->textInput(['class' => 'form-control'])->label('Аббревиатура:');?>
            <?=$f->field($form, 'code')->textInput(['class' => 'form-control'])->label('Код дисциплины:');?>
            <?=$f->field($form, 'hour_all')->textInput(['class' => 'form-control'])->label('Всего часов в текущем году:');?>
            <?=$f->field($form, 'hour_aud')->textInput(['class' => 'form-control'])->label('Теоретических часов:');?>
            <?=$f->field($form, 'hour_lab')->textInput(['class' => 'form-control'])->label('Лабораторных часов:');?>
            <?=$f->field($form, 'hour_kurs')->textInput(['class' => 'form-control'])->label('Курсовых часов:');?>
            <?=$f->field($form, 'hour_kons')->textInput(['class' => 'form-control'])->label('Консультационных часов:');?>
            <?=$f->field($form, 'hour_exam')->textInput(['class' => 'form-control'])->label('Экзаменационных часов:');?>
            <?=$f->field($form, 'split_lab')->checkbox(['label'=>''])->label('Деление лабораторных на подгруппы:'); ?>
            <?=$f->field($form, 'split_kurs')->checkbox(['label'=>''])->label('Деление курсовых на подгруппы:'); ?>
            <?='<div class="subj_title">Часов в неделю</div>'?>
            <?=$f->field($form, 'count_hs_aud')->textInput(['class' => 'form-control'])->label('Осенний семестр:');?>
            <?=$f->field($form, 'count_hs_lab')->textInput(['class' => 'form-control'])->label('Лабораторных часов в неделю:');?>
            <?=$f->field($form, 'count_hs_kurs')->textInput(['class' => 'form-control'])->label('Курсовых часов в неделю:');?>
            <?=$f->field($form, 'term_check_s')->textInput(['class' => 'form-control'])->dropdownList(type_check::find()->select('type_check')->indexBy('type_check')->column(), ['prompt'=>''])->label('Контроль:');?>
            <?=$f->field($form, 'count_ha_aud')->textInput(['class' => 'form-control'])->label('Весенний семестр:');?>
            <?=$f->field($form, 'count_ha_lab')->textInput(['class' => 'form-control'])->label('Лабораторных часов в неделю:');?>
            <?=$f->field($form, 'count_ha_kurs')->textInput(['class' => 'form-control'])->label('Курсовых часов в неделю:');?>
            <?=$f->field($form, 'term_check_a')->textInput(['class' => 'form-control'])->dropdownList(type_check::find()->select('type_check')->indexBy('type_check')->column(), ['prompt'=>''])->label('Контроль:');?>

            <?='<div class="bottom_container">';?>
            <a href=<?=Yii::$app->urlManager->createUrl('site/administration');?>>Назад</a>
            <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']);?>
            <?='</div>';?>
            <?php ActiveForm::end();

            if(isset($_POST['butform']))
            {
                try
                {
                    $subject = new subject();
                    $subject->name = $_POST["NewSubject"]["name"];
                    $subject->meta_name = $_POST["NewSubject"]["meta_name"];
                    $subject->code = $_POST["NewSubject"]["code"];

                    $subject->hour_all = $_POST["NewSubject"]["hour_all"];
                    $subject->hour_aud = $_POST["NewSubject"]["hour_aud"];
                    $subject->hour_lab = $_POST["NewSubject"]["hour_lab"];
                    $subject->hour_kurs = $_POST["NewSubject"]["hour_kurs"];
                    $subject->hour_kons = $_POST["NewSubject"]["hour_kons"];
                    $subject->hour_exam = $_POST["NewSubject"]["hour_exam"];

                    $subject->split_lab = $_POST["NewSubject"]["split_lab"];
                    $subject->split_kurs = $_POST["NewSubject"]["split_kurs"];

                    $subject->count_hs_aud = $_POST["NewSubject"]["count_hs_aud"];
                    $subject->count_hs_lab = $_POST["NewSubject"]["count_hs_lab"];
                    $subject->count_hs_kurs = $_POST["NewSubject"]["count_hs_kurs"];
                    $subject->term_check_s = $_POST["NewSubject"]["term_check_s"];
                    $subject->count_ha_aud = $_POST["NewSubject"]["count_ha_aud"];
                    $subject->count_ha_lab = $_POST["NewSubject"]["count_ha_lab"];
                    $subject->count_ha_kurs = $_POST["NewSubject"]["count_ha_kurs"];
                    $subject->term_check_a = $_POST["NewSubject"]["term_check_a"];
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