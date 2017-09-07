<?php
/**
 * Created by PhpStorm.
 * User: Админ
 * Date: 08.04.2017
 * Time: 18:00
 */


namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class EditGroup extends Model
{
    public $idusp;
    public $idspec;
    public $name;
    public $countstudents;
    public $yearstart;
    public $kurs;
    public $idcurator;
    public $group;
    public $hidden;

    public function rules()
    {
        return [
            [['idusp','idspec','name','count_students','year_start','kurs'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }

    public function oopEditGroup()
    {
        $form = new EditGroup();
        $data = \Yii::$app->request->post('EditGroup', []);
        //$form->description = isset($data['description']) ? $data['description'] : null;
        if (isset($data['group'])) {
            $db = Yii::$app->db;
            $poditemmenu = $db->createCommand("SELECT `idSpec`, `name`, `count_students`, `year_start`, `kurs`, `idCurator` FROM `group` WHERE idGroup = " . $data['group'] . "")->queryOne();
            $form->idspec = isset($poditemmenu['idSpec']) ? $poditemmenu['idSpec'] : '';
            $form->idcurator = isset($poditemmenu['idCurator']) ? $poditemmenu['idCurator'] : '';
        } else {
            $form->idspec = isset($_POST['EditGroup']['group']) ? $_POST['EditGroup']['group'] : '';
            $form->idcurator = isset($_POST['EditGroup']['idcurator']) ? $_POST['EditGroup']['idcurator'] : '';
        }

        $form->group = isset($data['group']) ? $data['group'] : '';
        if(isset($_SESSION['logged_user']))
        {
            $f = ActiveForm::begin(
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
                $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form'
                    ]]);?>
                <?='<div class="new_auditory_form">';?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $data['group']])->label('');?>
                <?=$f->field($form, 'name')->textInput(['class' => 'styler', 'value' => $poditemmenu['name']])->label('Название:');?>
                <?=$f->field($form, 'idspec')->dropdownList(spec::find()->select(['name', 'idSpec'])->indexBy('idSpec')->column(), ['prompt'=>''])->label('Специальность');?>
                <?=$f->field($form, 'count_students')->textInput(['class' => 'styler','value' => $poditemmenu['count_students']])->label('Количество студентов:');?>
                <?=$f->field($form, 'year_start')->textInput(['class' => 'styler','value' => $poditemmenu['year_start']])->label('Год начала обучения:');?>
                <?=$f->field($form, 'kurs')->textInput(['class' => 'styler','value' => $poditemmenu['kurs']])->label('Курс:');?>
                <?=$f->field($form, 'idcurator')->dropdownList(teacher::findBySql('SELECT  concat(`last_name`, " " , `first_name`, " ", `middle_name`), `idTeacher` FROM teacher')->indexBy('idTeacher')->column(), ['prompt'=>''])->label('Куратор:')?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();?>

            <?}
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('group', ['name' => $data['name'], 'idSpec' => $data['idspec'], 'count_students' => $data['count_students'], 'year_start' => $data['year_start'], 'kurs' => $data['kurs'], 'idCurator' => $data['idcurator']], 'idGroup =\'' . $data['hidden'] . '\'')
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