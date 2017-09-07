<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\db\Exception;

class EditAuditory extends Model
{
    public $name;
    public $auditory;
    public $type;
    public $audtype;
    public $hidden;

    public function rules()
    {
        return [
            [['name','auditory','type','audtype'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }

    public function oopEditauditory()
    {
        $form = new EditAuditory();
        $data = \Yii::$app->request->post('EditAuditory', []);
        $form->auditory = isset($data['auditory']) ? $data['auditory'] : null;

        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
        );?>
            <?=$f->field($form, 'auditory')->dropdownList(auditory::find()->select(['name', 'idAuditory'])->indexBy('idAuditory')->column(), ['prompt'=>''])->label(''); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?= Html::submitButton('Показать', ['name '=> 'show', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['show']))
            {
                $db = Yii::$app->db;
                $poditemmenu = $db->createCommand("SELECT `name`, `type` FROM `auditory` WHERE idAuditory = ".$data['auditory']."")->queryOne(); ?>
                <?php $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form'
                    ]]);?>
                <?='<div class="new_auditory_form">';?>
                <?=$f->field($form, 'name')->textInput(['class' => 'styler', 'value' => $poditemmenu['name']])->label('Имя:');?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $_POST['EditAuditory']['auditory']])->label('');?>
                <?=$f->field($form, 'type')->textInput(['class' => 'styler', 'value' => $poditemmenu['type']])->label('Тип:');?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();?>

            <?}
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('auditory', ['name' => $data['name'], 'type' => $data['type']], 'idAuditory =\'' . $data['hidden'] . '\'')
                        ->execute();

                    /*$auditory = new auditory();
                    $auditory->idUsp = '1М';
                    $auditory->name = $_POST ["NewAuditory"]["name"];
                    $auditory->type = $_POST ["NewAuditory"]["type"];
                    $auditory->save();*/
                    echo '<div class="success_add">Добавление прошло успешно</div>';
                }
                catch(Exception $e)
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