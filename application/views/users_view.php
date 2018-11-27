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
            <li><a class="active">Управление пользователями</a></li>
            <li><a href="/admin/applications">Управление Заявками</a></li>
            <li><a href="/admin/adduser">Добавить пользователя</a></li>
            <li><a href="/admin/logout" style="margin-top: 447px">Выход</a></li>
        </ul>
    </nav>
    <div class="col-md-9 table-container">
        <table class="table table-hover">
            <thead class="table-active">
            <tr>
                <th>#</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Должность</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if( isset($users) && is_array($users) ) {foreach ($users as $user):?>
            <tr>
                <th scope="row"><?= $user['id'];?></th>
                <td><?= $user['first_name'];?></td>
                <td><?= $user['last_name'];?></td>
                <td><?= $user['middle_name'];?></td>
                <td><?= $user['login'];?></td>
                <td><?= $user['password'];?></td>
                <td><?= $user['position'];?></td>
                <td style="width: 50px">
                    <a href="/admin/user/<?= $user['id'];?>" class="btn btn-dark btn-lg pull-right button-submit">Редактировать</a>
                </td>
                <td style="width: 30px">
                    <a href="/admin/deleteuser/<?= $user['id'];?>" class="btn btn-dark btn-lg pull-right button-submit">Удалить</a>
                </td>
            </tr>
            <?php endforeach;}?>

            </tbody>
        </table>
    </div>
</div>
<footer class="container-fluid" style="z-index: 1">
    <a class="logo" href="http://www.rario.ru/">&copy; 2018 Агентство развития информационного общества РАРИО</a>
</footer>
</body>
</html>
