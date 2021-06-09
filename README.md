<h2>Приложение Open CRM на Laravel и Vue JS frameworks</h2>

<h4>Инструкция по развертыванию проекта для тестирования</h4>
<p>Перед началом установки проекта и его зависимостей, убедитесь что у вас установлен <a href="https://getcomposer.org/">composer</a> и <a href="https://nodejs.org/ru/">nodejs</a></p>
<hr>

<ul>
    <li>Выполнить git clone</li>
    <li>Выполнить команду <b>composer upgrade</b></li>
    <li>Выполнить команду <b>composer install</b></li>
    <li>Сконфигурировать новый файл .env, выполнив команду <b>php artisan key:generate</b></li>
    <li>Импортировать дамп базы данных из файла <b>diplom.sql</b></li>
    <li>В сконфигурированном ранее файле окружения (.env) добавить имя импортированной базы данных <b>DB_DATABASE=diplom</b></li>
    <li>Запустить локальный сервер с помощью <b>php artisan serve</b></li>
</ul>
<hr>

<h4>Для разработки</h4>
<p>Дополнительно заюзать след.команды </p>
<ul>
    <li>Выполнить команду <b>npm install</b></li>
    <li>Выполнить команду <b>npm run dev</b></li>
    <li>Выполнить команду <b>npm run watch</b></li>
</ul>
