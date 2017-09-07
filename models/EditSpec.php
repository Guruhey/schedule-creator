<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class EditSpec extends Model
{
    public $idspec;
    public $name;
    public $code;
    public $hidden;
    public $spec;

    const SCENARIO_SPEC = 'spec';

    public function rules()
    {
        return [
            [['idspec','name','code'],'required', 'message' => 'Это обязательное поле! '],
            [['spec'], 'safe']

        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_SPEC => ['spec']
        ];
    }

    public function oppEditSpec()
    {
        #$form =  new EditSpec();
        $form = new EditSpec(['scenario' => EditSpec::SCENARIO_SPEC]);
        //Массовое присвоение
        $data = \Yii::$app->request->post('EditSpec', []);
        $form->spec = isset($data['spec']) ? $data['spec'] : null;

        if(isset($_SESSION['logged_user']))
        {?>

            <?php $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
        );?>
            <?=$f->field($form, 'spec')->dropdownList(spec::find()->select(['name', 'idSpec'])->indexBy('idSpec')->column(), ['prompt'=>''])->label(''); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Показать', ['name '=> 'show', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['show']))
            {
                $db = Yii::$app->db;
                $poditemmenu = $db->createCommand("SELECT `name`, `code` FROM `spec` WHERE idSpec = ".$_POST['EditSpec']['spec']."")->queryOne(); ?>
                <?php $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form'
                    ]]);?>
                <?='<div class="new_auditory_form">';?>
                <?=$f->field($form, 'name')->textInput(['class' => 'styler','value' => $poditemmenu['name']])->label('Имя специальности:'); ?>
                <?=$f->field($form, 'code')->textInput(['class' => 'styler','value' => $poditemmenu['code']])->label('Код:'); ?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $_POST['EditSpec']['spec']])->label('');?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();?>

            <?}
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('spec', ['name' => $_POST['EditSpec']['name'], 'code' => $_POST['EditSpec']['code']], 'idSpec =\'' . $_POST['EditSpec']['hidden'] . '\'')
                        ->execute();

                    /*$auditory = new auditory();
                    $auditory->idUsp = '1М';
                    $auditory->name = $_POST ["NewAuditory"]["name"];
                    $auditory->type = $_POST ["NewAuditory"]["type"];
                    $auditory->save();*/
                    echo '<div class="success_add">Добавление прошло успешно</div>';
                }
                catch (Exception $e)
                {
                    echo '<div style="color:red;">Something went wrong</div>';
                }
            }
        }
        else
        {
            echo 'Доступ неавторезированным пользователям запрещен!';
        }

    }
}