function ExOne()
{
    $('.hey').mouseover(function(){
        //alert('dикая херня');
        $ix = Math.random() * ($(window).height() - 150);
        $iy = Math.random() * ($(window).width() - 200);
        //$ix = Math.floor(Math.random(1)*($(window).height() -33));
        //$iy = Math.floor(Math.random(1)*($(window).width() + 1)-150);
        $('.hey').css(
            {
                "position":"absolute",
                "top":$ix,
                "left":$iy,
                "width":200,
                "height":100,
            })
    });
}