**Инструкция запуска**
----

**Тестовое задание для разработчика**
----
Создать приложение на Yii2, реализующее функции личного кабинета.

Проект базировать на шаблоне advanced. Можно использовать только функционал, предоставленный фреймворком, и расширения. Нельзя использовать сторонние готовые модули, реализующие полностью либо частично функционал, описанный в данном тестовом задании, в части бизнес-логики.
Все необходимые зависимости подключать с помощью Composer.
Разработку проекта вести в GIT. В первом коммите разместить только каркас приложения (развёрнутый шаблон advanced), последующие - по усмотрению разработчика.
В ходе работы над заданием следовать стандартам кодирования PSR, а также основным принципам разработки.
Схему базы данных создавать через миграции с использованием ORM.
Дизайн и расположение элементов интерфейса на сайте свободное, на своё усмотрение. Рекомендуется использовать Bootstrap.

Приложение разделить на две части: Frontend (общедоступная часть) и Backend (административная панель).

1. Frontend-часть приложения.

Frontend должен содержать следующие разделы:
•	главная страница (содержит список пользователей с постраничной навигацией)
•	страница регистрации (форма: логин, пароль, подтверждение пароля)
•	страница авторизации (форма: логин+пароль, “запомнить меня”)
•	страница редактирования своего профиля
•	страница просмотра профиля

Все разделы Frontend должны иметь pretty-url, маршруты именовать на усмотрение разработчика.

Неавторизованному пользователю доступны действия: регистрация, авторизация.
Авторизованному пользователю доступны действия: заполнение своего профиля, выход из системы.
Всем доступны действия: просмотр списка пользователей, просмотр профиля.

Профиль пользователя должен содержать информацию: фамилия, имя отчество, дата рождения, поле “о себе”, фотография пользователя.

2. Backend-часть приложения.

Backend должен быть доступен по URL “/admin”.

Вход в Backend (админ-панель) должен быть доступен только по следующим реквизитам доступа:
Логин: admin
Пароль: admin

Backend должен содержать раздел работы с пользователями, реализующий CRUD:
•	список пользователей
•	редактирование пользователя
•	создание нового пользователя
•	просмотр данных пользователя
•	удаление пользователя



Финальный код приложения расположить в общедоступном репозитории. Рабочую развёрнутую версию (можно с тестовыми данными, без очистки базы) разместить на любой площадке, где можно проверить работоспособность.

Сообщить также количество времени, потраченное на выполнение тестового задания.


Опционально (будет плюсом, но можно не делать)

Настроить автоматический CI/CD для приложения с использованием инструментов, предоставленных репозиторием (Gitlab, Bitbucket и пр.).
Необходимо сделать два варианта деплоя из двух веток.
1. Деплой кода в ветке “development” должен инициализировать окружение разработки.
2. Деплой кода в ветке “production” должен инициализировать боевое окружение.
Оба варианта должны обновлять на сервере, куда происходит деплой, код приложения из соответствующей ветки, инициализировать окружение, устанавливать и обновлять зависимости composer, выполнять миграции, чистить кэш, а также выполнять иные процессы, необходимые для работы приложения.

