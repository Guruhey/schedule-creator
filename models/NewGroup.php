<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class NewGroup extends Model
{
    public $idusp;
    public $idspec;
    public $name;
    public $countstudents;
    public $yearstart;
    public $kurs;
    public $idcurator;
    public $group;

    public function rules()
    {
        return [
            [['idusp', 'idspec', 'name', 'countstudents', 'yearstart', 'kurs'], 'required', 'message' => 'Это обязательное поле! '],
        ];
    }

    public function oopGroup()
    {
        $form = new NewGroup();
        #session_start();

        if (isset($_SESSION['logged_user'])) {
            ?>
            <?php $f = ActiveForm::begin([
                'options' => [
                    'class' => 'new_group_form'
                ]
            ]); ?>

            <?= $f->field($form, 'name')->textInput(['class' => 'form-control'])->label('Название:'); ?>
            <?= $f->field($form, 'group')->textInput(['class' => 'form-control'])->dropdownList(\app\models\spec::find()->select(['name', 'idSpec'])->indexBy('idSpec')->column(), ['prompt' => ''])->label('Специальность:'); ?>
            <?= $f->field($form, 'countstudents')->textInput(['class' => 'form-control'])->label('Количество студентов:'); ?>
            <?= $f->field($form, 'yearstart')->textInput(['class' => 'form-control'])->label('Год начала обучения:'); ?>
            <?= $f->field($form, 'kurs')->textInput(['class' => 'form-control'])->label('Курс:'); ?>
            <?= $f->field($form, 'idcurator')->textInput(['class' => 'form-control'])->dropdownList(\app\models\teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher')->indexBy('idTeacher')->column(), ['prompt' => ''])->label('Куратор:') ?>
            <?php echo '<div class="bottom_container">'; ?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?= Html::submitButton('Добавить', ['name ' => 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?php echo '</div>'; ?>
            <?php ActiveForm::end();
            if (isset($_POST['butform']))
            {
                try
                {
                    $group = new group();
                    $group->name = $_POST["NewGroup"]["name"];
                    $group->idUSP = '1';
                    $group->idSpec = $_POST["NewGroup"]["group"];
                    $group->count_students = $_POST["NewGroup"]["countstudents"];
                    $group->year_start = $_POST["NewGroup"]["yearstart"];
                    $group->kurs = $_POST["NewGroup"]["kurs"];
                    $group->idCurator = $_POST["NewGroup"]["idcurator"];
                    $group->save();
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
?>