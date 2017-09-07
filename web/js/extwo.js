function ExTwo() {
    $fio = $("#fio").val();
    $ages = $("#ages").val();
    $date = $("#date").val();
    $regular_fio = /^[А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+ [А-ЯЁ][а-яё]+$/u;

    if($fio.match($regular_fio) != null)
    {
        if($ages < 6)
        {
            $jer = "Жеребенок";
        }
        else if($ages >= 6 && $ages < 16)
        {
            $jer = "Шкодник";
        }
        else if($ages >= 16 && $ages < 40)
        {
            $jer = "Бывалый старик";
        }
        else if($ages >= 40)
        {
            $jer = "Ветеринар";
        }
        $("#grup").text($jer);

        function get_current_age(date) {
            return ((new Date().getTime() - new Date(date)) / (24 * 3600 * 365.25 * 1000)) | 0;
        }

        $current_age = get_current_age($date);

        if ($current_age != $ages) {
            alert("Ваш возраст не совпадает с датой");
        }

        $arrdate = $date.split('-');
        $bday = new Date(2017, $arrdate[1] - 1, $arrdate[2]);
        $now = new Date();
        $newnow = new Date($now.getFullYear(), $now.getMonth(), $now.getDate());
        $remaining = ($bday - $newnow) / (24 * 3600 * 1000);

        if ($remaining < 0)
        {
            $remaining += 365;
        }
        alert('До вашего дня рождения осталось ' + $remaining);
    }
    else
    {
        alert('invalid ФИО');
    }
}

