<?php
namespace app\components;

use yii\base\Component;
use yii\helpers\Html;
use Yii;

class AuthComponent extends Component{ // объявляем класс
	public $content;
	
	public function init(){ // функция инициализации. Если данные не будут переданы в компонент, то он выведет текст "Текст по умолчанию"
		parent::init();
		$this->content= 'Текст по умолчанию';
	}
	
	static function factors($n = 0, $array = FALSE) 
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

    public function display(){ // функция отображения данных
		#echo Html::encode($this->content); // вывод данных
		return $this->content;
	}
	
	public function auth()
	{

        $session = Yii::$app->session;
        $session->open();
		$db = Yii::$app->db;
		$login = '
			<div class="login">
				<div class="drop" style="display: none;">
					<form method="POST">
							<input type="text" name="login" placeholder="Введите логин" value="'.$_POST['login'].'">
							<input type="password" name="pass" placeholder="Введите пароль" value="'.$_POST['pass'].'">
							<input type="hidden" name="_frontendCSRF" value="'.Yii::$app->request->getCsrfToken().'" />
							<input id="button" class="styler" type="submit" name="submit" value="Войти">
					</form>
				</div>
				<a class="log">Вход</a>
			</div>'; 
		
		$logout =  '<form method="POST" action="'.Yii::$app->params['SERVER'].'">
						<input id="logout_button" class="styler" type="submit" name="logout" value="Выход">
						<input type="hidden" name="_frontendCSRF" value="'.Yii::$app->request->getCsrfToken().'" />
					</form>';

		if(isset($_POST['submit']))
		{
				$user = $db->createCommand('SELECT * FROM `user` WHERE login="'.$_POST['login'].'"')->queryOne();
				$hash_in_db = $user['hash_pass'];

				if(password_verify($_POST['pass'], $hash_in_db))
				{
				    $session->set('logged_user',$user['login']);
					if(isset($session['logged_user']))
					{
					    $access = self::factors($user['access'],TRUE);
                        $session->set('access',$access);
					}
					$this->content = $logout;
					return;
				}
				else
				{
						$login = '
						<div class="login">
							<div class="drop">
								<form method="POST">
										<input type="text" name="login" placeholder="Введите логин" value="'.$_POST['login'].'">
										<input type="password" name="pass" placeholder="Введите пароль" value="'.$_POST['pass'].'">
										<input type="hidden" name="_frontendCSRF" value="'.Yii::$app->request->getCsrfToken().'" />
										<input id="button" class="styler" type="submit" name="submit" value="Войти"> 
										<span id="error">Неверные данные!</span>
								</form>
							</div>
							<a class="log">Скрыть</a>
						</div>'; 
					
				}
				$this->content = $login;
				return;
		}
		else 
		{
			if(isset($_POST['logout']))
			{
				#session_unset($_SESSION['logged_user']);
                $session->close();
                $session->remove('logged_user');
                $session->remove('access');
				#session_unset($_SESSION['access']);
				$this->content = $login;
				return;
			}
			if ( $session['access']==NULL)
			{
				$this->content = $login;
				return;
			}
			else
			{
				$this->content = $logout;
				return;
			}
		}
		#echo Html::encode($this->content);
	}
	
}

?>