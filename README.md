# confectionery_delight
1. Убедитесь, что у вас установлен Open Server Panel
2. Разархивируйте zip-файл "confectionery-delight" в директорию "domains" на вашем сервере
3. Зайдите в phpMyAdmin на вашем сервере и создайте новую базу данных под названием "confectionery_delight"
4. Импортируйте дамп базы данных в созданную ранее базу данных
5. В корне проекта найдите файл ".env" и отредактируйте его. Укажите необходимые настройки для подключения к базе данных. Рекомендуемые:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=confectionery_delight
DB_USERNAME=root
DB_PASSWORD=
6. Откройте терминал в папке проекта "confectionery-delight" и выполните команду composer install, чтобы установить все необходимые зависимости
7. После установки зависимостей в консоли выполните команду php artisan serve для запуска встроенного сервера Laravel
8. Откройте браузер и перейдите по адресу, который будет указан после запуска сервера
9. Для входа в панель администратора используйте адрес, указанный после запуска сервера, дописав /admin/login. Логин и пароль: admin@admin.admin и admin соответственно
*Для корректной работы проекта рекомендуется использовать следующие версии модулей: Apache_2.4-PHP_8.0-8.1, PHP_8.1, MySQL-5.7-Win10


