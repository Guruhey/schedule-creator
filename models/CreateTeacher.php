<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

class CreateTeacher extends Model
{
    public $first_name;
    public $last_name;
    public $middle_name;
    public $vkr;
    public $category;
    public $email;

    public function rules()
    {
        return [
            [['last_name','middle_name','first_name','category'],'required', 'message' => 'Это обязательное поле! '],
            ['email','email', 'message' => 'Некоректный email адрес! ']
        ];
    }
    public function oopNewTeacher()
    {
        $form = new CreateTeacher();
        $data = \Yii::$app->request->post('CreateTeacher', []);

        if(isset($_SESSION['logged_user'])) {

            $f = ActiveForm::begin([
                'options' => [
                    'class' => 'new_form_form'
                ]
            ]); ?>
            <?= $f->field($form, 'last_name')->textInput(['class' => 'form-control'])->label('Фамилия:') ?>
            <?= $f->field($form, 'first_name')->textInput(['class' => 'form-control'])->label('Имя:') ?>
            <?= $f->field($form, 'middle_name')->textInput(['class' => 'form-control'])->label('Отчество:') ?>
            <?= $f->field($form, 'vkr')->checkbox(['label'=>''])->label('ВКР:'); ?>
            <?= $f->field($form, 'category')->textInput(['class' => 'form-control'])->dropDownList([
                'Высшая квалифиицкационная категория' => 'Высшая квалифиицкационная категория',
                '1-ая квалификационная катеогрия' => '1-ая квалификационная катеогрия',
                '2-ая квалификационная катеогрия' => '2-ая квалификационная катеогрия',
            ],['prompt' => ''])->label("Категория:") ?>
            <?= $f->field($form, 'email')->textInput(['class' => 'styler'])->label('Email:'); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['butform']))
            {
                try
                {
                    $teacher = new teacher();
                    $teacher->last_name = $data['last_name'];
                    $teacher->first_name = $data['first_name'];
                    $teacher->category = $data['category'];
                    $teacher->middle_name = $data['middle_name'];
                    $teacher->vkr = $data['vkr'];
                    $teacher->email = $data['email'];
                    $teacher->save();
                    echo '<div class="success_add">Добавление прошло успешно</div>';
                    //$db = Yii::$app->db;
                    //$result = $db->createCommand("INSERT INTO `teacher` (`first_name`, `last_name`, `middle_name`, `vkr`, `category`, `email`) VALUES ('2', '3', '4', '5', '6', 'guruhey@gmail.com')")->execute();
                }
                catch (Exception $e)
                {
                    echo '<div style="color:red;font-size: 20px;">Данная группа уже существует в базе данных, если вы хотите изменить данные, воспользуйтесь другой функцией</div>';
                }
            }

        }
        else
        {
            echo 'Доступ неавторезированным пользователям запрещен!';
        }

    }
}