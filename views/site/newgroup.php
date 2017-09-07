<?
$this->title = 'Добавление группы';
$object = new \app\models\NewGroup();
$object->oopGroup();
/*php
session_start();
$this->title = 'Добавление группы';
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\group;
if(isset($_SESSION['logged_user']))
{?>
    <?php $f = ActiveForm::begin([
            'options' => [
                'class' => 'new_group_form'
             ]
        ]); ?>
    <?=$f->field($form, 'name')->textInput(['class' => 'form-control'])->label('Название:');?>
    <?=$f->field($form, 'group')->textInput(['class' => 'form-control'])->dropdownList(\app\models\spec::find()->select(['name', 'idSpec'])->indexBy('idSpec')->column(), ['prompt'=>''])->label('Специальность:');?>
    <?=$f->field($form, 'countstudents')->textInput(['class' => 'form-control'])->label('Количество студентов:');?>
    <?=$f->field($form, 'yearstart')->textInput(['class' => 'form-control'])->label('Год начала обучения:');?>
    <?=$f->field($form, 'kurs')->textInput(['class' => 'form-control'])->label('Курс:');?>
    <?=$f->field($form, 'idcurator')->textInput(['class' => 'form-control'])->dropdownList(\app\models\teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher')->indexBy('idTeacher')->column(), ['prompt'=>''])->label('Куратор:')?>
    <?php echo '<div class="bottom_container">';?>
    <?php echo '<a href="administration">Назад</a>'; ?>
    <?= Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
    <?php echo '</div>';?>
    <?php ActiveForm::end();
    if(isset($_POST['butform']))
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

}
else
{
    echo 'Доступ неавторезированным пользователям запрещен!';
}
*/
?>

