<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class NewAuditory extends Model
{
    public $idusp;
    public $name;
    public $type;

    public function rules()
    {
        return [
            [['idusp','name'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    public function oppNewAuditory()
    {
        $form = new NewAuditory();
        #session_start();

        if(isset($_SESSION['logged_user']))
        {

            $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
            );?>

            <?=$f->field($form, 'name')->textInput(['class' => 'form-control'])->label('Имя:'); ?>
            <?=$f->field($form, 'type')->textInput(['class' => 'form-control'])->label('Тип:'); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['butform']))
            {
                try
                {
                    $auditory = new auditory();
                    $auditory->idUsp = '1М';
                    $auditory->name = $_POST ["NewAuditory"]["name"];
                    $auditory->type = $_POST ["NewAuditory"]["type"];
                    $auditory->save();
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