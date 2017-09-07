<?/*php
session_start();
$db = Yii::$app->db;

function factors($n = 0, $array = FALSE) 
{
    $pf = array();  
    for ($i = 2; $i <= $n / $i; $i++) { 
        while ($n % $i == 0) {
            $pf[] = $i;
            $n = $n / $i;
        }       
    }

    if ($n > 1) $pf[] = $n;
    return ($array === TRUE) ? $pf : implode(' * ', $pf);
}

if(isset($_POST['submit']))
{
        $user = $db->createCommand('SELECT * FROM `user` WHERE login="'.$_POST['login'].'"')->queryOne();
        $hash_in_db = $user['hash_pass'];
        
        
        if(password_verify($_POST['pass'], $hash_in_db))
        {
            $_SESSION['logged_user'] = $user['login'];
            if(isset($_SESSION['logged_user']) )
            {
                $_SESSION['access'] = factors($user['access'],TRUE);
                #var_dump($_SESSION);
                #var_dump($user);
            }
        ?>
            <form method="POST">
                <input type="submit" name="logout" value="Выход">
                <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
            </form>
            <?php
            
        } 
}
else 
{
    if(isset($_POST['logout']))
    {
        #session_destroy();
        session_unset($_SESSION['logged_user']);
        session_unset($_SESSION['access']); 
    }
    
    if($_SESSION['access'] == NULL)
    {
    */?>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="main_block">
            <form method="POST">
                <div class="block">
                    <input type="text" name="fio" placeholder="ФИО" id="fio"><br>
                    <input type="number" max= "120" min = "1" name="ages" placeholder="Возраст" id="ages"><br>
                    <input type="date" name="date" id="date"><br>
                    <input type="button" value="Отправка" name="buttform" onclick="ExTwo()" style="width:80px;height:20px;">
                </div>
                <div id="grup"></div>
            </form>
        </div>

        <div class="hey" style="background: #faff00">
            <span onmouseover="ExOne()">НАВЕДИ СЮДА, ШЛЮПКА</span>
        </div>
    </body>
</html>
<?/*php
    }
else
{
?>
    <form method="POST">
        <input type="submit" name="logout"  value="Выход">
        <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
    </form>
<?php
}
}
*/?>
