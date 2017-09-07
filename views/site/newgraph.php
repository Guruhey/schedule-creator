<?php
$this->title = 'Добавление графика учебного процесса';
$object = new \app\models\NewGraph();
$object->oopGraph();
/*
session_start();
$this->title = 'Добавление графика учебного процесса';
$form->year = date("Y");
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\graph;

if(isset($_SESSION['logged_user']))
{?>
    <?php $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_graph_form'
             ]
        ]);
    ?>
    <?= $f->field($form, 'group')->textInput(['class' => 'form-control'])->dropdownList(\app\models\group::find()->select(['name', 'idGroup'])->indexBy('idGroup')->column(), ['prompt'=>'Выберите...'])->label('Группа:');?>
    <?= $f->field($form, 'year')->textInput(['class' => 'form-control'])->label('Год:') ?>
    <?= $f->field($form, 'countweeks')->textInput(['class' => 'form-control'])->label('Колличество недель осенью:'); ?>
    <?= $f->field($form, 'countweeka')->textInput(['class' => 'form-control'])->label('Колличество недель весной:'); ?>
    <?php echo '<div class="bottom_container">';?>
    <?php echo '<a href="administration">Назад</a>'; ?>
    <?= Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
    <?php echo '</div>';?>
    <?php ActiveForm::end();
    if(isset($_POST['butform']))
    {
        $graph = new graph();
        $graph->idGroup = $_POST["NewGraph"]["group"];
        $graph->year = $_POST["NewGraph"]["year"];
        $graph->count_week_s = $_POST["NewGraph"]["countweeks"];
        $graph->count_week_a = $_POST["NewGraph"]["countweeka"];
        $graph->save();
        echo '<div class="success_add">Добавление прошло успешно</div>';
    }
}
else
{
    echo 'Доступ неавторезированным пользователям запрещен!';
}*/
?>
