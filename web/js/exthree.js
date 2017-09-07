function ExThree()
{
    $("#grup").text("");
    $first = $("#first").val();
    $second = $("#second").val();
    $operator = $("#operator").val();
    if($operator == '*' || $operator == '/' || $operator == '%' || $operator == '+' || $operator == '-' || $operator == '**' || $operator == '^')
    {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        $.ajax({
            async: "true",
            type: "post",
            url: "http://guru.arzhakov.pro/codethree",//C:\Users\User\PhpstormProjects\guru\views\site\codethree.php
            response: "text",
            data: {'first': $first, 'second': $second, 'operator': $operator, '_frontendCSRF': csrfToken},
            success: test
        });
    }
    else
    {
        $("#grup").text("Вы ввели неверный оператор! Или деление на ноль.\nМогут быть * / % + - ** ^");
    }
}

function test(any)
{
    alert(any);
    if(any !='Делитель не может быть нулем')
        $("#res").val(any);
    else
        $("#grup").text(any);
}