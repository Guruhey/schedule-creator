function close(){
	$('.scheduleform .forms_cont .cont').css({
		'display': 'none',
		'border': '1px solid white',
	    'padding': '10px',
	    'margin-bottom': '45px',
	    'margin-left': '0',
		'margin-right': '0'
	});
}
$('.split_type_1').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block'
	});
});
$('.split_type_2').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(2)').css({
		'display': 'block'
	});
});
$('.split_type_3').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block',
		'margin-left': '200px',
		'margin-right': '200px'
	});
	$('.forms_cont .cont:nth-of-type(2)').css({
		'display': 'block',
		'margin-left': '200px',
		'margin-right': '200px'
	});
});
$('.split_type_4').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(2)').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(3)').css({
		'display': 'block'
	});
});
$('.split_type_5').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block',
		'margin-left': '200px',
		'margin-right': '200px'
	});
	$('.forms_cont .cont:nth-of-type(2)').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(3)').css({
		'display': 'block'
	});
});    
$('.split_type_6').click(function(){
	close();
	$('.forms_cont .cont:first-of-type').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(2)').css({
		'display': 'block'
	});
	$('.forms_cont .cont:nth-of-type(3)').css({
		'display': 'block'
	});
	$('.forms_cont .cont:last-of-type').css({
		'display': 'block'
	});
});