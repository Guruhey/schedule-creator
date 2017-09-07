$back = "";
$div = "";
function rgbToHex (r, g, b)
{
    r = r.toString(16);
    g = g.toString(16);
    b = b.toString(16);

    if (r.length == 1) r = '0' + r;
    if (g.length == 1) g = '0' + g;
    if (b.length == 1) b = '0' + b;

    return (r + g + b).toUpperCase();
}

function createRgb() {
	var r = getRandomInt(0, 255);
    var g = getRandomInt(0, 255);
    var b = getRandomInt(0, 255);
    return new Array(r, g, b)
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function absolute_shit(){
	$width = Math.random() * ($(window).width() - 20);
	$height = Math.random() * ($(window).height() - 20);
	$top = Math.random() * ($(window).height() - $height);
	$left = Math.random() * ($(window).width() - $width);

	a = createRgb();
	b = createRgb();
	border = new Array();

	$("#task_one").css({"border": "none"});

	if(Math.abs(a[0]-b[0])<13){
		border[0] = 0;
		border[1] = 150;
		border[2] = 150;
		$("#task_one").css({"border": "20px solid #"+rgbToHex(border[0],border[1],border[2])});
	}
	if(Math.abs(a[1]-b[1])<13){
		border[0] = 150;
		border[1] = 0;
		border[2] = 150;
		$("#task_one").css({"border": "20px solid #"+rgbToHex(border[0],border[1],border[2])});
	}
	if(Math.abs(a[2]-b[2])<13){
		border[0] = 150;
		border[1] = 150;
		border[2] = 0;
		$("#task_one").css({"border": "20px solid #"+rgbToHex(border[0],border[1],border[2])});
	}

	$("#task_one").css(
		{
			"position":"fixed",
			"top": $top,
			"left": $left,
			"height": $height,
			"width": $width,
			"background": "#"+rgbToHex(a[0],a[1],a[2])
		}
	);

	$('body').css(
		{
		"background": "#"+rgbToHex(b[0],b[1],b[2])
		}
	);

	$back = rgbToHex(b[0],b[1],b[2]);
	$div = rgbToHex(a[0],a[1],a[2]);

}

function saving(){
	var csrfToken = $('meta[name="csrf-token"]').attr("content"); 
	$.ajax({
		async: "true",
		type: "post",
		url: "http://guru.arzhakov.pro/shto_eta1",
		response: "text",
		data: {'back': "#"+$back, 'div': "#"+$div, '_frontendCSRF': csrfToken},
		success: vse_okey
	});
}

function vse_okey(){
	alert("Заебись");
}