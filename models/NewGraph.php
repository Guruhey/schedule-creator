<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelpe;
use \yii\db\Exception;

class NewGraph extends Model
{
    public $year;
    public $countweeks;
    public $countweeka;
    public $group;

    public function rules()
    {
        return [
            [['year','group','countweeks','countweeka'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    //Отображение страницы newgraph
    public function oopGraph()
    {
        #session_start();
        $form = new NewGraph();
        $form->year = date("Y");

        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_graph_form'
            ]
        ]);?>
            <?= $f->field($form, 'group')->textInput(['class' => 'form-control'])->dropdownList(\app\models\group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>'Выберите...'])->label('Группа:');?>
            <?= $f->field($form, 'year')->textInput(['class' => 'form-control'])->label('Год:') ?>
            <?= $f->field($form, 'countweeks')->textInput(['class' => 'form-control'])->label('Колличество недель осенью:'); ?>
            <?= $f->field($form, 'countweeka')->textInput(['class' => 'form-control'])->label('Колличество недель весной:'); ?>
            <?= '<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?= Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?= '</div>';?>
            <? ActiveForm::end();
            if (isset($_POST['butform']))
            {
                try
                {
                    $graph = new graph();
                    $graph->idGroup = $_POST["NewGraph"]["group"];
                    $graph->year = $_POST["NewGraph"]["year"];
                    $graph->count_week_s = $_POST["NewGraph"]["countweeks"];
                    $graph->count_week_a = $_POST["NewGraph"]["countweeka"];
                    $graph->save();
                    echo '<div class="success_add">Добавление прошло успешно</div>';
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
?>