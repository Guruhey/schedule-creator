<form id="w0" class="new_tarific_form" action="/tarific" method="post">
    <input type="hidden" name="_frontendCSRF" value="eEtfU0EzaGc7OhRjJ3UsDx0ZPRANST0qGgIWOg1dMRJPOzsGBWcMPg==">
    <div class="form-group field-newtarific-group required">
        <label class="control-label" for="newtarific-group">Группа:</label>
        <select id="newtarific-group" class="form-control" name="NewTarific[group]" aria-required="true">
            <option value=""></option>
            <option value="32">ИБ-41</option>
            <option value="38">П-41</option>
        </select>

        <div class="help-block"></div>
    </div>
  
    <div class="form-group field-newtarific-year required">
        <label class="control-label" for="newtarific-year">Год:</label>
        <input type="text" id="newtarific-year" class="styler" name="NewTarific[year]" value="2017" aria-required="true">

        <div class="help-block"></div>
    </div>
    <div class="bottom_container"><a href="administration">Назад</a>
        <button type="submit" id="add_new_aud" class="styler" name="butform">Показать</button>
    </div>
</form>
<table id="table_look_prepod">
    <tbody>
        <tr>
            <td class="head b" colspan="14">Нагрузки группы: <!-- Сюда название --> за <!-- Сюда год --> год</td>
        </tr>
        <tr class="head_row">
            <td rowspan="2">Код дисциплины</td>
            <td rowspan="2">Название дисциплины</td>
            <td rowspan="2">Нагрузка</td>
            <td colspan="6"> Из них в текущем году</td>
            <td colspan="2">Часов в неделю</td>
            <td colspan="2">Контроль</td>
            <td rowspan="2">Преподаватель</td>
        </tr>
        <tr class="head_row_2">
            <td>Всего</td>
            <td>Теоритические</td>
            <td>Лабораторные</td>
            <td>Консультации</td>
            <td>Экзамен</td>
            <td>Курсовые</td>
            <td>Осень</td>
            <td>Весна</td>
            <td>Осень</td>
            <td>Весна</td>
        </tr>
        <tr>
            <td>ОУД. 01</td>
            <td>Русский язык и литература</td>
            <td>262</td>
            <td>234</td>
            <td>234</td>
            <td>0</td>
            <td>20</td>
            <td>8</td>
            <td>0</td>
            <td>6</td>
            <td>6</td>
            <td>Экзамен</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 02</td>
            <td>Иностранный язык</td>
            <td>82</td>
            <td>78</td>
            <td>78</td>
            <td>0</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 03</td>
            <td>Математика: алгебра и начала математического анализа , геометрия</td>
            <td>301</td>
            <td>273</td>
            <td>273</td>
            <td>0</td>
            <td>20</td>
            <td>8</td>
            <td>0</td>
            <td>7</td>
            <td>7</td>
            <td>Экзамен</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 04</td>
            <td>История</td>
            <td>96</td>
            <td>78</td>
            <td>78</td>
            <td>0</td>
            <td>10</td>
            <td>8</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Экзамен</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 05</td>
            <td>Физическая культура</td>
            <td>117</td>
            <td>117</td>
            <td>0</td>
            <td>117</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>3</td>
            <td>3</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 06</td>
            <td>ОБЖ</td>
            <td>82</td>
            <td>78</td>
            <td>62</td>
            <td>16</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 07</td>
            <td>Информатика</td>
            <td>82</td>
            <td>78</td>
            <td>28</td>
            <td>50</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 08</td>
            <td>Обществознание</td>
            <td>40</td>
            <td>40</td>
            <td>30</td>
            <td>10</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>3</td>
            <td>3</td>
            <td>Экзамен</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 08</td>
            <td>Обществознание( вкл. Экономику )</td>
            <td>44</td>
            <td>40</td>
            <td>30</td>
            <td>10</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 08</td>
            <td>Обществознание( право)</td>
            <td>39</td>
            <td>37</td>
            <td>27</td>
            <td>10</td>
            <td>2</td>
            <td>0</td>
            <td>0</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 09</td>
            <td>Естествознание</td>
            <td>84</td>
            <td>66</td>
            <td>48</td>
            <td>18</td>
            <td>10</td>
            <td>8</td>
            <td>0</td>
            <td></td>
            <td>3</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 09</td>
            <td>Естествознание (раздел физики)</td>
            <td>51</td>
            <td>51</td>
            <td>41</td>
            <td>10</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>3</td>
            <td></td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 11</td>
            <td>Технология</td>
            <td>96</td>
            <td>78</td>
            <td>28</td>
            <td>50</td>
            <td>10</td>
            <td>8</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД. 12</td>
            <td>Индивидуальный проект</td>
            <td>86</td>
            <td>78</td>
            <td>18</td>
            <td>60</td>
            <td>8</td>
            <td>0</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>ОУД.10</td>
            <td>География</td>
            <td>82</td>
            <td>78</td>
            <td>78</td>
            <td>0</td>
            <td>4</td>
            <td>0</td>
            <td>0</td>
            <td>2</td>
            <td>2</td>
            <td>Диф. зачёт</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2" class="b">Итого:</td>
            <td>1410</td>
            <td>1276</td>
            <td>955</td>
            <td>321</td>
            <td>94</td>
            <td>40</td>
            <td>0</td>
            <td>33</td>
            <td>36</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>