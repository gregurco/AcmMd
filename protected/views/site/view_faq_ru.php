<h1 class="text-center">FAQ</h1>

<p><b>- Что мы можем найти на данном сайте?</b></p>
<p>- Данный сайт содержит архив задач по олимпиадному программированию со встроенной проверяющей системой.</p>
<br/>
<p><b>- Что нужно сделать, для участия в данной системе?</b></p>
<p>- Для участия в системе достаточно зарегистрироваться и перейти в раздел <b>"Задачи"</b>, где вы сможете найти задачи разной сложности и тематики. Сдав задачу, она пройдет 10 тестов, за каждый тест вы сможете получить по 10 баллов, сумма баллов за все задачи и будут формировать вашу позицию в рейтинге.</p>
<br/>
<p><b>- Какова специфика задач и как их отправлять на сервер?</b></p>
<p>- Все задачи требуют работы с файлами <b>input.txt</b> и <b>output.txt</b>, предназначенными для чтения входных данных и вывода результата соответственно. Отправлять решения можно только зарегистрированным пользователям в виде исходного кода в файлах с расширением <b>*.pas</b>.</p>
<br/>
<p><b>- На каких языках можно сдавать написанные задачи?</b></p>
<p>- Проверяющая система обрабатывает только программы, реализованные на языке <b>Pascal</b>, используя компилятор <b>Free Pascal 4.2.0</b>.</p>
<br/>
<p><b>- Где я могу скачать Free Pascal?</b></p>
<p>- Скачать установщик Free Pascal версии 2.4.0 можно <a href='/files/fpc-2.4.0.i386-win32.exe'>здесь</a></p>
<br/>
<p><b>- Что происходит после отправки задачи на сервер?</b></p>
<p>- Каждая отправленная задача компилируется на сервере, и в случае успешной компиляции, она проходит 10 тестов. Вы получаете 10 баллов за тест, если: ваш ответ совпадает с нашим ответом, тест уложился во временные рамки и рамки занятой памяти.</p>
<br/>
<p><b>- Как понять, что задача решена правильно?</b></p>
<p>- Если задача скомпилировалась удачно и вы набрали 100 баллов, то ваше решение правильное.</p>
<br/>
<p><b>- Как формируется рейтинг?</b></p>
<p>- Рейтинг формируется из суммы баллов наилучших решений задач. Если вы сдали на 1 задаче 2 решения, и одно набрало 50 баллов, а второе 70, то учтется только 70.</p>
<br/>
<p><b>- Что делать, если ответ на вопрос тут не найден?</b></p>
<p>- Высылайте свои вопросы по адресу gregurco.vlad@gmail.com</p>
<br/>
<p><b>- Как понять то, что выдает нам тестировщик?</b></p>
<p>- В логе задач, напротив каждого теста, Вы можете увидеть следующие сообщения:</p>

<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <tr>
            <th width=10%>Сообщение</th> <th width=45%>Событие</th> <th width=45%>Причина</th>
        </tr>

        <tr>
            <td><font color=Green>Accepted</font></td>
            <td>Задача прошла тест, ваш ответ верен и выуложились в ограничения времени и памяти.</td>
            <td align=center valign=middle>-</td>
        </tr>


        <tr>
            <td><font color=Red>Compilation error</font></td>
            <td>Задача не прошла компиляцию. Текст ошибки можно увидеть в логе задачи.</td>
            <td>В коде была допущена синтаксическая ошибка.</td>
        </tr>

        <tr>
            <td><font color=Red>Wrong answer</font></td>
            <td>Ваш ответ не сходится с ответом Администрации сайта.</td>
            <td>В коде была допущена логическая ошибка.</td>
        </tr>

        <tr>
            <td><font color=Red>Time limit</font></td>
            <td>Время выполнения задачи превысил допустимый лимит.</td>
            <td>Вам нужно изменить алгоритм решения или оптимизировать его.</td>
        </tr>

        <tr>
            <td><font color=Red>File doesn't exist</font></td>
            <td valign=top>Не найден выходной файл.</td>
            <td>Проверьте, правильно ли вы назвали выходной файл и создается ли он у вас при всех возможных условиях.</td>
        </tr>

        <tr>
            <td>Waiting</td>
            <td>Ожидание</td>
            <td>Задача стоит в очереди на компиляцию</td>
        </tr>

        <tr>
            <td>Compiling</td>
            <td>Компиляция программы</td>
            <td>Необходимо время для создания исполняемого файла</td>
        </tr>

        <tr>
            <td>Running</td>
            <td>Тестирование программы</td>
            <td>Идет тестирование программы путем ее запуска для каждого имеющегося теста</td>
        </tr>
    </table>
</div>