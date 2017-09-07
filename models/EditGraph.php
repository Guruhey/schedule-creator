<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\db\Exception;

class EditGraph extends Model
{
    public $year;
    public $countweeks;
    public $countweeka;
    public $hidden;
    public $group;

    public function rules()
    {
        return [
            [['year','countweeks','countweeka'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }

    public function oopEditGraph()
    {
        $form = new EditGraph();
        $data = \Yii::$app->request->post('EditGraph', []);
        $form->group = isset($data['group']) ? $data['group'] : null;


        if(isset($_SESSION['logged_user']))
        {?>

            <?php $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
        );?>
            <?=$f->field($form, 'group')->dropdownList(group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>''])->label(''); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?= Html::submitButton('Показать', ['name '=> 'show', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['show']))
            {
                $db = Yii::$app->db;
                $poditemmenu = $db->createCommand("SELECT `year`, `count_week_s`, `count_week_a` FROM `graph` WHERE idGroup = ".$data['group']."")->queryOne(); ?>
                <?php $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form'
                    ]]);?>
                <?='<div class="new_auditory_form">';?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $data['group']])->label('');?>
                <?=$f->field($form, 'year')->textInput(['class' => 'styler','value' => $poditemmenu['year']])->label('Год:') ?>
                <?=$f->field($form, 'count_week_s')->textInput(['class' => 'styler','value' => $poditemmenu['count_week_s']])->label('Колличество недель осенью:') ?>
                <?=$f->field($form, 'count_week_a')->textInput(['class' => 'styler','value' => $poditemmenu['count_week_a']])->label('Колличество недель весной:') ?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();?>

            <?}
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('graph', ['year' => $data['year'], 'count_week_s' => $data['count_week_s'], 'count_week_a' => $data['count_week_a']], 'idGroup =\'' . $data['hidden'] . '\'')
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