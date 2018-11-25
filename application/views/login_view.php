<!DOCTYPE html>
<html lang="ru">
<head>
    <title>РАРИО - Админ панель</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/blog.css" rel="stylesheet">
    <style>
        .bg-cover {
            background-image: url('/images/jumbotron.jpg');
            height: 722px;
        }
        overflow-y: hidden;
    </style>
</head>
<body>
<div class="container-fluid bg-cover">
    <form class="form-signin" role="form" method="post" action="/admin/login">
        <h2 class="form-signin-heading" style="text-align: center; font-size: 3rem">Авторизация</h2>
        <input type="text" class="form-control" name="login" placeholder="Логин" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="font-size: 2.25rem; margin-top: 15px">Войти</button>
    </form>
</div>
</body>
</html>