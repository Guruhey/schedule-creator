<?php

/*$this->title = 'Задача 3';

 $x = $_POST["first"];
 $y = $_POST["second"];
 $oper = $_POST["oper"];
*/
?>
<h5 class="ajax_fail"></h5>
<form action="" id="target">
    <div id="form-group-first" class="form-group">
      <label for="first">Первое число:</label>
      <input type="number" class="form-control" id="first" placeholder="Число">
      <span id="helpBlockFirst" class="help-block"></span>
    </div>
    <div id="form-group-second" class="form-group">
      <label for="second">Второе число:</label>
      <input type="number" class="form-control has-success" id="second" placeholder="Число">
      <span id="helpBlockAge" class="help-block"></span>
    </div>
    <div id="form-group-oper" class="form-group">
      <label for="oper">Оператор:</label>
      <input type="text" class="form-control has-success" id="oper" placeholder="Оператор">
      <span id="helpBlockOper" class="help-block"></span>
    </div>
    <div id="form-group-answer" class="form-group">
      <label for="answer">Результат:</label>
      <input disabled="true" type="text" class="form-control has-success" id="answer" placeholder="Тут будет ответ">
      <span id="helpBlockAnswer" class="help-block"></span>
    </div>
    <button onclick="shto_eto()" type="button" class="btn btn-default">Отправить</button>
</form>