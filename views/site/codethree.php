<?php
if(!empty($_POST['operator'] && !empty($_POST['first']) && !empty($_POST['second'])))
{
    if($_POST['operator'] == '*')
    {
        echo $_POST['first'] * $_POST['second'];
    }

    else if($_POST['operator'] == '/')
    {
        if($_POST['second'] == '0')
        {
            echo 'Делитель не может быть нулем';
        }
        else
        {
            echo $_POST['first'] / $_POST['second'];
        }
    }

    else if($_POST['operator'] == '%')
    {
        echo $_POST['first'] % $_POST['second'];
    }

    else if($_POST['operator'] == '+')
    {
        echo $_POST['first'] + $_POST['second'];
    }

    else if($_POST['operator'] == '-')
    {
        echo $_POST['first'] - $_POST['second'];
    }

    else if($_POST['operator'] == '**' or $_POST['operator'] == '^')
    {
        echo pow($_POST['first'], $_POST['second']);
    }
}