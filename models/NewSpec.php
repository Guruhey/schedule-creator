<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class NewSpec extends Model
{
    public $idspec;
    public $name;
    public $code;

    public function rules()
    {
        return [
            [['idspec','name','code'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    public function oppNewSpec()
    {
        $form =  new NewSpec();
        #session_start();

        if(isset($_SESSION['logged_user']))
        {?>

            <?php $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_spec_form'
            ]
        ]); ?>
            <?= $f->field($form, 'name')->textInput(['class' => 'form-control'])->label('Имя специальности:'); ?>
            <?= $f->field($form, 'code')->textInput(['class' => 'form-control'])->label('Код:'); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?= Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?ActiveForm::end();
            if(isset($_POST['butform']))
            {
                try
                {
                    $spec = new spec();
                    #$spec->idSpec = 1;
                    $spec->name = $_POST ["NewSpec"]["name"];
                    $spec->code = $_POST ["NewSpec"]["code"];
                    $spec->save();
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