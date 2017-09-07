<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class EditSubject extends Model
{
    public $idsubject;
    public $subject;
    public $name;
    public $meta_name;
    public $code;
    public $hour_all;
    public $hour_aud;
    public $hour_lab;
    public $hour_kurs;
    public $hour_kons;
    public $hour_exam;
    public $split_lab;
    public $split_kurs;
    public $count_hs_aud;
    public $count_hs_lab;
    public $count_hs_kurs;
    public $count_ha_aud;
    public $count_ha_lab;
    public $count_ha_kurs;
    public $term_check_s;
    public $term_check_a;
    public $hidden;

    public function rules()
    {
        return [
            [['idsubject','name','meta_name','code','hour_all','hour_aud','hour_lab','hour_kurs','hour_kons','hour_exam','split_lab','split_kurs','count_hs_aud','count_hs_lab','count_hs_kurs','count_ha_aud','count_ha_lab','count_ha_kurs','term_check_s','term_check_a'],'required', 'message' => 'Это обязательное поле! '],
        ];
    }
    public function oopEditSubject()
    {
        $form =  new EditSubject();
        $data = \Yii::$app->request->post('EditSubject', []);
        if(isset($data['subject']))
        {
            $db = Yii::$app->db;
            $poditemmenu = $db->createCommand("SELECT `name`, `meta_name`, `code`, `hour_all`, `hour_aud`, `hour_lab`, `hour_kurs`, `hour_kons`, `hour_exam`, `split_lab`, `split_kurs`, `count_hs_aud`, `count_hs_lab`, `count_hs_kurs`, `count_ha_aud`, `count_ha_lab`, `count_ha_kurs`, `term_check_s`, `term_check_a` FROM `subject` WHERE idSubject = ".$_POST['EditSubject']['subject']."")->queryOne();
            $form->term_check_a = isset($poditemmenu['term_check_a']) ? $poditemmenu['term_check_a'] : '';
            $form->term_check_s = isset($poditemmenu['term_check_s']) ? $poditemmenu['term_check_s'] : '';
        }
        else
            $form->term_check_a = isset($data['term_check_a']) ? $data['term_check_a'] : '';

        $form->subject = isset($data['subject']) ? $data['subject'] : null;

        if(isset($_SESSION['logged_user']))
        {?>

            <?php $f = ActiveForm::begin(
            [
                'options' => [
                    'class' => 'new_auditory_form'
                ]
            ]
            );?>
            <?=$f->field($form, 'subject')->dropdownList(subject::find()->select(['name', 'idSubject'])->indexBy('idSubject')->column(), ['prompt'=>''])->label(''); ?>
            <?='<div class="bottom_container">';?>
            <a href="<?=Yii::$app->urlManager->createUrl('site/administration');?>">Назад</a>
            <?=Html::submitButton('Показать', ['name '=> 'show', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
            <?='</div>';?>
            <?php ActiveForm::end();
            if(isset($_POST['show']))
            {
                $f = ActiveForm::begin(
                [
                    'options' => [
                        'class' => 'new_auditory_form'
                    ]]);?>
                <?php echo '<div class="new_auditory_form">';?>
                <?=$f->field($form, 'hidden')->hiddenInput(['value' => $data['subject']])->label('');?>
                <?=$f->field($form, 'name')->textInput(['class' => 'styler','value' => $poditemmenu['name']])->label('Название дисциплины:');?>
                <?=$f->field($form, 'meta_name')->textInput(['class' => 'styler','value' => $poditemmenu['meta_name']])->label('Аббревиатура:');?>
                <?=$f->field($form, 'code')->textInput(['class' => 'styler','value' => $poditemmenu['code']])->label('Код дисциплины:');?>
                <?=$f->field($form, 'hour_all')->textInput(['class' => 'styler','value' => $poditemmenu['hour_all']])->label('Всего часов в текущем году:');?>
                <?=$f->field($form, 'hour_aud')->textInput(['class' => 'styler','value' => $poditemmenu['hour_aud']])->label('Теоретических часов:');?>
                <?=$f->field($form, 'hour_lab')->textInput(['class' => 'styler','value' => $poditemmenu['hour_lab']])->label('Лабораторных часов:');?>
                <?=$f->field($form, 'hour_kurs')->textInput(['class' => 'styler','value' => $poditemmenu['hour_kurs']])->label('Курсовых часов:');?>
                <?=$f->field($form, 'hour_kons')->textInput(['class' => 'styler','value' => $poditemmenu['hour_kons']])->label('Консультационных часов:');?>
                <?=$f->field($form, 'hour_exam')->textInput(['class' => 'styler','value' => $poditemmenu['hour_exam']])->label('Экзаменационных часов:');?>
                <?php
                if($poditemmenu['split_lab'])
                    echo $f->field($form, 'split_lab')->checkbox(['label'=>'','checked ' => ''])->label('Деление лабораторных на подгруппы:');
                else
                    echo $f->field($form, 'split_lab')->checkbox(['label'=>''])->label('Деление лабораторных на подгруппы:');

                if($poditemmenu['split_kurs'])
                    echo $f->field($form, 'split_kurs')->checkbox(['label'=>'','checked ' => ''])->label('Деление курсовых на подгруппы:');
                else
                    echo $f->field($form, 'split_kurs')->checkbox(['label'=>''])->label('Деление курсовых на подгруппы:');
                ?>

                <div class="styler">Часов в неделю:</div>
                <?=$f->field($form, 'count_hs_aud')->textInput(['class' => 'styler','value' => $poditemmenu['count_hs_aud']])->label('Осенний семестр:');?>
                <?=$f->field($form, 'count_hs_lab')->textInput(['class' => 'styler','value' => $poditemmenu['count_hs_lab']])->label('Лабораторных часов в неделю:');?>
                <?=$f->field($form, 'count_hs_kurs')->textInput(['class' => 'styler','value' => $poditemmenu['count_hs_kurs']])->label('Курсовых часов в неделю:');?>
                <?=$f->field($form, 'term_check_s')->dropdownList(type_check::find()->select('type_check')->indexBy('type_check')->column(), ['prompt'=>''])->label('Контроль');?>
                <?=$f->field($form, 'count_ha_aud')->textInput(['class' => 'styler','value' => $poditemmenu['count_ha_aud']])->label('Весенний семестр:');?>
                <?=$f->field($form, 'count_ha_lab')->textInput(['class' => 'styler','value' => $poditemmenu['count_ha_lab']])->label('Лабораторных часов в неделю:');?>
                <?=$f->field($form, 'count_ha_kurs')->textInput(['class' => 'styler','value' => $poditemmenu['count_ha_kurs']])->label('Курсовых часов в неделю:');?>
                <?=$f->field($form, 'term_check_a')->dropdownList(type_check::find()->select('type_check')->indexBy('type_check')->column(), ['prompt'=>''])->label('Контроль');?>
                <?=Html::submitButton('Добавить', ['name '=> 'butform', 'class' => 'styler', 'id' => 'add_new_aud']); ?>
                <?='</div>';?>
                <?php ActiveForm::end();

            }
            if(isset($_POST['butform']))
            {
                try
                {
                    Yii::$app->db->createCommand()
                        ->update('subject', ['name' => $data['name'],
                            'meta_name' => $data['meta_name'],
                            'code' => $data['code'],
                            'hour_all' => $data['hour_all'],
                            'hour_aud' => $data['hour_aud'],
                            'hour_lab' => $data['hour_lab'],
                            'hour_kurs' => $data['hour_kurs'],
                            'hour_kons' => $data['hour_kons'],
                            'hour_exam' => $data['hour_exam'],
                            'split_lab' => $data['split_lab'],
                            'split_kurs' => $data['split_kurs'],
                            'count_hs_aud' => $data['count_hs_aud'],
                            'count_hs_lab' => $data['count_hs_lab'],
                            'count_hs_kurs' => $data['count_hs_kurs'],
                            'term_check_s' => $data['term_check_s'],
                            'count_ha_aud' => $data['count_ha_aud'],
                            'count_ha_lab' => $data['count_ha_lab'],
                            'count_ha_kurs' => $data['count_ha_kurs'],
                            'term_check_a' => $data['term_check_a']], 'idSubject =\'' . $data['hidden'] . '\'')
                        ->execute();

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