<?php
$this->title = 'Расписание';
?>
<div class="schedule_container">
      <form>
			<div id="group">
				<div class="title">Группа</div>
				<select data-placeholder="Выберите группу">
					<option value=""></option>
					<option value="">ИБ</option>
					<option value="">ВТ</option>
					<option value="">ЫФВ</option>
				</select>
			</div>
  				

		 	<div id="version">
				<div class="title">Версия расписания</div>
				<select data-placeholder="Выберите версию">
					<option></option>
					<option>1.1</option>
					<option>1.2</option>
					<option>1.3</option>
					<option>1.4</option>
				</select>
            </div>

            <div class="bnt_cnt">
            	<input class="styler" type="submit" value="Показать">
            </div>
        </form>
</div>

<div class="schedule_table">
            <table>

              <thead>
                <tr>
                  <th>День</th>
                  <th>Номер пары</th>
                  <th>Дисциплина</th>
                  <th>Преподаватель</th>
                  <th>Аудитория</th>
                </tr>
              </thead>

              <tbody>
              <?php
              /*
              $arr = ['Понедельник', 'Вторник','Среда','Четверг','Пятница'];
              $pars = 5;
              foreach ($arr as $day)
              {
                  echo "<tr>
                <td rowspan=\"".($pars+1)."\">$day</td>";
                  for ($i=1; $i<=$pars; $i++){
                      $addclass = $i==$pars ? 'class="last_lesson"' : '';
                      echo    "</tr>
                            <tr onclick=\"ScheduleForm()\" $addclass >
                            <td>$i</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>";
                  }

              }*/
              ?>
                <tr>
                  <td rowspan="6">Понедельник</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="under">
                      <div class="left"></div>
                      <div class="right">Иностранный язык</div>
                    </div>
                    <div class="below"></div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left"></div>
                      <div class="right">Аксёнова М.А</div>
                    </div>
                    <div class="below"></div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left"></div>
                      <div class="right">Ауд. 31</div>
                    </div>
                    <div class="below"></div>
                  </td>
                </tr>
                
                <tr>
                  <td>2</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="under">МДК 03.01</div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under">Гаврилин Д.Р</div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under">Ауд. 35</div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>
                <tr class="last_lesson">
                  <td>5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <td rowspan="6">Вторник</td>
                </tr>

                <tr>
                  <td>1</td>
                  <td>
                    <div class="under">
                      <div class="left">МДК 03.01</div>
                      <div class="right">Физ. осн. зациты инф.</div>
                    </div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left">Гаврилин Д.Р</div>
                      <div class="right">Егоров И.Г</div>
                    </div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left">Ауд. 35</div>
                      <div class="right">Ауд. 120</div>
                    </div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>

                <tr>
                  <td>2</td>
                  <td>
                    <div class="under">
                      <div class="left">МДК 03.01</div>
                      <div class="right"></div>
                    </div>
                    <div class="below">
                      <div class="left"></div>
                      <div class="right">Физ. осн. зациты инф.</div>
                    </div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left">Гаврилин Д.Р</div>
                      <div class="right"></div>
                    </div>
                    <div class="below">
                      <div class="left"></div>
                      <div class="right">Егоров И.Г</div>
                    </div>
                  </td>
                  <td>
                    <div class="under">
                      <div class="left">Ауд. 35</div>
                      <div class="right"></div>
                    </div>
                    <div class="below">
                      <div class="left"></div>
                      <div class="right">Ауд. 120</div>
                    </div>
                  </td>
                </tr>

                <tr>
                  <td>3</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>

                <tr>
                  <td>4</td>
                  <td>
                    <div class="under"></div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under"></div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under"></div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>

                <tr class="last_lesson">
                  <td>5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <td rowspan="6">Среда</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="under">Проектирование карьеры</div>
                    <div class="below"></div>
                  </td>
                  <td>
                    <div class="under">Савина Е. В.</div>
                    <div class="below"></div>
                  </td>
                  <td>
                    <div class="under">Ауд. 42</div>
                    <div class="below"></div>
                  </td>
                </tr>

                <tr>
                  <td>2</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="under">МДК 03.01</div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under">Гаврилин Д.Р</div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under">Ауд. 35</div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>
                <tr class="last_lesson">
                  <td>5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <td rowspan="6">Четверг</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Иностранный язык</td>
                  <td>
                    <div class="split">
                      <div class="left">Аксёнова М.А</div>
                      <div class="right">Хачирова А.М</div>
                    </div>
                  </td>
                  <td>
                    <div class="split">
                      <div class="left">Ауд. 31</div>
                      <div class="right">Ауд. 36</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="under">МДК 03.01</div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under">Гаврилин Д.Р</div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under">Ауд. 35</div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>
                <tr class="last_lesson">
                  <td>5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

                <tr>
                  <td rowspan="6">Пятница</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Иностранный язык</td>
                  <td>
                    <div class="split">
                      <div class="left">Аксёнова М.А</div>
                      <div class="right">Хачирова А.М</div>
                    </div>
                  </td>
                  <td>
                    <div class="split">
                      <div class="left">Ауд. 31</div>
                      <div class="right">Ауд. 36</div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>МДК 03.01</td>
                  <td>Гаврилин Д.Р</td>
                  <td>Ауд. 35</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>
                    <div class="under">МДК 03.01</div>
                    <div class="below">Проектирование карьеры</div>
                  </td>
                  <td>
                    <div class="under">Гаврилин Д.Р</div>
                    <div class="below">Савина Е. В.</div>
                  </td>
                  <td>
                    <div class="under">Ауд. 35</div>
                    <div class="below">Ауд. 42</div>
                  </td>
                </tr>
                <tr class="last_lesson">
                  <td>5</td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>

              </tbody>
            </table>
        </div>