<?php
class Room
{
    public $color = 'green';

    public function getColor()
    {
        echo $this->color;
    }
    public function changeColor($newcolor)
    {
        $this->color = $newcolor;
    }
}

$object = new Room();

//$object->color = 'red';

//$object->getColor();
$object->changeColor('yellow');
$object->getColor();
?>









<?
//Форма inputfile-а
/*php
session_start();
$this->title = 'Education';
use yii\helpers\Html;
use yii\widgets\ActiveForm;

if(isset($_SESSION['logged_user']))
{?>
    <?php $f = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?=$f->field($form, 'file')->fileInput();?>
    <?= Html::submitButton('Добавить'); ?>
    <?php ActiveForm::end() ?>
<?}
else
{
    echo 'Доступ неавторезированным пользователям запрещен!';
}
*/
?>
<!--<html>
<head>
    <title>ex 3</title>
</head>
<body>
<div class="main_block">
    <form method="POST">
        <div class="block">
            <input type="text" name="first" placeholder="Первый элемент" id="first"><br>
            <input type="text" name="second" placeholder="Второй элемент" id="second"><br>
            <input type="text" name="operator" placeholder="Оператор" id="operator"><br>
            <input type="text" placeholder="Ответ" id="res"><br>
            <input type="button" value="Отправка" name="buttform" onclick="ExThree()" style="width:80px;height:20px;">
        </div>
        <div id="grup"></div>
    </form>
</div>
</body>
</html>
-->