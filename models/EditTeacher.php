<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class EditTeacher extends Model
{
    public $first_name;
    public $last_name;
    public $middle_name;
    public $vkr;
    public $category;
    public $email;
    public $hidden;
    public $teacher;

    public function rules()
    {
        return [
            [['first_name','last_name','middle_name','vkr','email','hidden','teacher'],'required', 'message' => 'Это обязательное поле! '],
            ['email','email', 'message' => 'Некоректный email адрес! ']
        ];
    }
    public function oopEditTeacher()
    {
        $form = new EditTeacher();
        $form->teacher = isset($_POST['EditTeacher']['teacher']) ? $_POST['EditTeacher']['teacher'] : '';
        if (isset($_POST['EditTeacher']['teacher'])) {
            $db = Yii::$app->db;
            $poditemmenu = $db->createCommand("SELECT `first_name`, `last_name`, `middle_name`, `vkr`, `category`, `email` FROM `teacher` WHERE idTeacher = " . $_POST['EditTeacher']['teacher'] . "")->queryOne();
            $form->category = isset($poditemmenu['category']) ? $poditemmenu['category'] : '';
        }else
            $form->category = isset($_POST['EditTeacher']['category']) ? $_POST['EditTeacher']['category'] : '';


        if(isset($_SESSION['logged_user']))
        {?>

            <?php $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
            );?>
            <?=$f->field($form, 'teacher')->dropdownList(teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher ORDER BY `last_name`')->indexBy('idTeacher')->column(), ['prompt'=>''])->label('')?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Показать', ['name '=> 'show', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['show']))
            {

                ?>
                <?php $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form',['prompt'=>'']
                    ]]);?>
                <?='<div class="new_auditory_form">';?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $_POST['EditTeacher']['teacher']])->label('');?>
                <?=$f->field($form, 'last_name')->textInput(['class' => 'styler','value' => $poditemmenu['last_name']])->label('Фамилия:') ?>
                <?=$f->field($form, 'first_name')->textInput(['class' => 'styler','value' => $poditemmenu['first_name']])->label('Имя:') ?>
                <?=$f->field($form, 'middle_name')->textInput(['class' => 'styler','value' => $poditemmenu['middle_name']])->label('Отчество:') ?>
                <?php
                    if($poditemmenu['vkr'])
                        echo $f->field($form, 'vkr')->checkbox(['label'=>'','checked ' => ''])->label('ВКР:');
                    else
                        echo $f->field($form, 'vkr')->checkbox(['label'=>''])->label('ВКР:');
                ?>
                <?=$f->field($form, 'category')->textInput(['class' => 'styler','value' => $poditemmenu['category']])->dropDownList([
                'Высшая квалифиицкационная категория' => 'Высшая квалифиицкационная категория',
                '1-ая квалификационная катеогрия' => '1-ая квалификационная катеогрия',
                '2-ая квалификационная катеогрия' => '2-ая квалификационная катеогрия',
                ],['prompt' => ''])->label("Категория:") ?>
                <?=$f->field($form, 'email')->textInput(['class' => 'styler','value' => $poditemmenu['email']])->label('Email:'); ?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();?>

            <?}
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('teacher', ['first_name' => $_POST['EditTeacher']['first_name'], 'last_name' => $_POST['EditTeacher']['last_name'], 'middle_name' => $_POST['EditTeacher']['middle_name'], 'vkr' => $_POST['EditTeacher']['vkr'], 'category' => $_POST['EditTeacher']['category'], 'email' => $_POST['EditTeacher']['email']], 'idTeacher =\'' . $_POST['EditTeacher']['hidden'] . '\'')
                        ->execute();
                        echo '<div class="success_add">Добавление прошло успешно</div>';
                }
                catch (Exception $e)
                {
                    echo '<div style="color:red;">Something went wrong</div>';
                }

                /*$auditory = new auditory();
                $auditory->idUsp = '1М';
                $auditory->name = $_POST ["NewAuditory"]["name"];
                $auditory->type = $_POST ["NewAuditory"]["type"];
                $auditory->save();*/
            }
        }
        else
        {
            echo 'Доступ неавторезированным пользователям запрещен!';
        }
    }
}