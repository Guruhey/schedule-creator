<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \yii\db\Exception;

class LayoutModel extends Model
{

    public function displayTabs()
    {
        $db = Yii::$app->db;
        $result = $db->createCommand('SELECT * FROM `menu` WHERE idParent is null AND access = 0 ORDER BY `order`')->queryAll();
        if($_SESSION['access'] != NULL)
        {
            $AddAccess = implode(" OR access = ", array_merge(array('0'), $_SESSION['access']));
            $result = $db->createCommand("SELECT * FROM `menu` WHERE idParent is null AND (access = $AddAccess) ORDER BY `order`")->queryAll();
        }
        $dropmenu = $db->createCommand("SELECT * FROM `menu` WHERE idParent = 15 ORDER BY `order`")->queryAll();
        for($i=0;$i<count($result);$i++)
        {
            if($i == 1)
            {?>
                <li>
                    <a class="perehod" href="<?=Yii::$app->params['SERVER'].$result[$i]['link'] ?>"><?=$result[$i]['title']?></a>
                    <ul class="drop_menu_main">
                        <div class="to_drop_menu"></div>
                        <? foreach ($dropmenu as $val)
                        {
                            echo '<li><a href="'.$val['link'].'">'.$val['title'].'</a></li>';}?>
                    </ul>
                </li>
                <?php
            }
            else
                echo '<li><a class="perehod" href="'.Yii::$app->params['SERVER'].$result[$i]['link'].'">'.$result[$i]['title'].'</a></li>';
        }
    }

}