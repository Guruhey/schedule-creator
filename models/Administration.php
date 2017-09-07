<?php


namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\db\Exception;

class Administration extends Model
{
    public function displayBlocks()
    {
        if(isset($_SESSION['logged_user']))
        {
            $AddAccess = implode(" OR access = ", array_merge(array('0'), $_SESSION['access']));
            $db = Yii::$app->db;
            $itemmenu = $db->createCommand("SELECT `idMenu`, `title` FROM `menu` WHERE idParent = 7 AND (access = $AddAccess) ORDER BY `order`")->queryAll();
            echo '<div class="adm_cont">';
            foreach ($itemmenu as $val)
            {
                echo '
                    <div class="adm_drop">
                      <buttom type="button" class="knopka">
                        <span class="shit">' . $val['title'] . '</span>
                        <div class="anim"></div>
                      </buttom>
                      <ul>';
                $poditemmenu = $db->createCommand("SELECT `title`, `link` FROM `menu` WHERE idParent = " . $val['idMenu'] . " AND (access = $AddAccess) ORDER BY `order`")->queryAll();
                foreach ($poditemmenu as $value) {
                    echo '<li><a href="' . $value['link'] . '">' . $value['title'] . '</a></li>';
                }
                echo '</ul>
                    </div>';
            }
            echo '</div>';
        }
        else
        {
            echo 'Вы не авторизированны';
        }
    }
}
