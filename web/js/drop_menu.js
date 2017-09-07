$(".menu li").mouseover(function(event) {
	$(this).find('.drop_menu_main').stop(true, false).slideDown(300);
});
$(".menu li").mouseleave(function(event) {
	$(this).find('.drop_menu_main').stop(true, false).slideUp(300);
});