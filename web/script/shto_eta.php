<?php
	switch ($_POST['oper']) {
		case '*':
			echo($_POST['first']*$_POST['second']);
			break;

		case '/':
			if($_POST['second'] == 0)
			{
				echo "Пидор";
				break;
			}
			else
			{
				echo($_POST['first']/$_POST['second']);
				break;
			}

		case '%':
			echo($_POST['first']%$_POST['second']);
			break;

		case '+':
			echo($_POST['first']+$_POST['second']);
			break;
		
		case '-':
			echo($_POST['first']-$_POST['second']);
			break;
		case '^':
			
		case '**':
			echo(pow($_POST['first'], $_POST['second']));
			break;

		default:
			echo("Ошибочка вышла");
			break;
		}
?>