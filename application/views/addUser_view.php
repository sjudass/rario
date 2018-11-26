<!DOCTYPE html>
<html lang="ru">
<head>
    <title>РАРИО - Админ панель</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <h1 style="color: #fff;">Агентство развития информационного общества РАРИО</h1>
</nav>
<div class="row" style="width: 100%">
    <nav class="col-md-3" id="menuVertical">
        <ul class="nav">
            <li><a href="/admin/users">Управление пользователями</a></li>
            <li><a href="/admin/application" style="margin-top: -195px">Управление Заявками</a></li>
            <li><a class="active" style="margin-top: -345px">Добавить пользователя</a></li>
        </ul>
    </nav>
    <form method="post" action="/admin/adduser" class="col-sm-9">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-sm-6 contact-form">
                    <label for="first_name" class="h5">Имя</label>
                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Введите имя" required>
                    <label for="last_name" class="h5">Фамилия</label>
                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Введите фамилию" required>
                    <label for="middle_name" class="h5">Отчество</label>
                    <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Введите отчество">
                </div>
                <div class="form-group col-sm-6 contact-form">
                    <label for="login" class="h5">Логин</label>
                    <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин" required>
                    <label for="password" class="h5">Пароль</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль" required>
                    <label for="position" class="h5">Должность</label>
                    <input type="text" name="position" class="form-control" id="position" placeholder="Укажите должность" required>
                </div>
                <div class="form-group submit">
                    <button type="submit" id="form-submit" class="btn btn-dark btn-lg pull-right button-submit">Внести изменения</button>
                    <a href="/admin/users" id="form-submit" class="btn btn-dark btn-lg pull-right button-submit">Назад</a>
                </div>
            </div>
        </div>
    </form>
</div>
<footer class="container-fluid" style="z-index: 1">
    <a class="logo" href="http://www.rario.ru/">&copy; 2018 Агентство развития информационного общества РАРИО</a>
</footer>
</body>
</html>
