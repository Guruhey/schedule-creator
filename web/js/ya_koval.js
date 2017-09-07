function shto_eto(){
	$first = $("#first").val();
	$second = $("#second").val();
	$oper = $("#oper").val();
	//(* / % + - ** ^)
	if($oper == "*" || $oper == "/" || $oper == "%" || $oper == "+" || $oper == "-" || $oper == "**" || $oper == "^")
	{
		$.ajax({
			async: "true",
			type: "post",
			url: "http://guru.arzhakov.pro/script/shto_eta.php",
			response: "text",
			data: {'first': $first, 'second': $second, 'oper': $oper},
			success: vse_ok
		});
	}
	else{
		$(".ajax_fail").text("Вы ввели неверный оператор! Или деление на ноль.\nМогут быть * / % + - ** ^")
	}

	function vse_ok(data){
		if(data == "Пидор")
			$(".ajax_fail").text(data);
		else
			$("#answer").val(data);
	}
}