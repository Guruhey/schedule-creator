$visible = 0;
$active = 0;
$('.adm_drop').click(function() {
    $visible = 0;

    if($(this).find('.knopka').css('color') == "rgb(53, 109, 162)"){
        $visible = 1;
    }

    $('.adm_drop').each(function () {
            $('.knopka').css({
                color: '#fff'
            });
            $('.anim').css({
                height: '0'
            });
            $(this).find('ul').stop(false, true).slideUp(200);
        }
    );

    if($visible == 0)
    {
        $(this).find('.knopka').css({
            color: '#356da2'
        });
        $(this).find('.anim').css({
            height: '260%',
            background: '#fff'
        });
        $(this).find('ul').stop(false, true).slideDown(200);
    }

});