<?php
	$db = Yii::$app->db;
    $result = $db->createCommand('INSERT INTO `colors` VALUES("'.$_POST['back'].'","'.$_POST['div'].'")')->execute();
?>