Установка сервера базы данных MySql

Для установки mysql сервера и клиента для работы с базой данных: apt-get install mysql-server mysql-client

Установить Веб сервер Apache2 apt-get install apache2

Установить PHP5 и модуль сервера mod-php apt-get install php5 libapache2-mod-php5

Установка необходимых для работы web приложения модулей php apt-get install php5-mysql

Для более удобной настройки приложения установить PHPMyAdmin apt-get install phpmyadmin

Перзапуск сервера service apache2 restart

После этого директория /var/www/html/ будет корневой папкой сайта.

Установка и первоначальная настройка веб приложения

Фреймворк с официального сайта yiiframework.com.

git clone https://github.com/vicky92/lab6_anekdot.git

Найти входной скрипт index.php и скопировать в кореневую директорию сайта. Открыть index.php и найти в нем строчку с подключением фреймворка, если путь к файлу yii.php неправильный - его необходимо исправить.

Скопировать папку protected в корневую директорию сайта.

Открыть файл настроек, который расположен по адресу /protected/config/main.php, и настроить подключение к базе данных отредактировав соответствующий параметр компонента db. Перейти в phpMyAdmin по адресу http://localhost/phpmyadmin/, перейти в раздел “импортировать” выбрать дамп базы данных (afisha.sql) и нажиать на кнопку “Импортировать”.
