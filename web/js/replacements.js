$('.today').click(function(){
	if($('.tomorrow_table').css('display') == "table")
	{

		$('.tomorrow_table').css({
            display: 'none',
        });
        $('.today_table').css({
            display: 'table',
        });
        $('.tomorrow').css({
            background: 'rgba(43,48,58,.95)',
            color: '#fff'
        });
        $(this).css({
            background: 'rgb(196,202,216)',
            color: '#000'
        });

	}
});
$('.tomorrow').click(function(){
	if($('.today_table').css('display') == "table"){

		$('.today_table').css({
            display: 'none',
        });
        $('.tomorrow_table').css({
            display: 'table',
        });
        $(this).css({
            background: 'rgb(196,202,216)',
            color: '#000'
        });
        $('.today').css({
            background: 'rgba(43,48,58,.95)',
            color: '#fff'
        });

	}
});