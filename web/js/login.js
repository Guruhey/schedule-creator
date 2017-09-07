var $log = $(".log");
$log.click(function () {
  $(this).siblings(".drop").stop(false, true).slideToggle(300);
  if($log.text() == "Вход")
  	$log.text("Скрыть");
  else
  	$log.text("Вход");
});