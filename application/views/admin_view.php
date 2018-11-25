{% block content %}
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
            <li><a href="#">Управление пользователями</a></li>
            <li><a href="#" style="margin-top: -290px">Управление Заявками</a></li>
        </ul>
    </nav>
    <div class="col-md-9">
        <table class="table table-hover" style="max-height: 733px; font-size: 1.8em">
            <thead class="table-active">
            <tr>
                <th>#</th>
                <th>Имя пользователя</th>
                <th>Пароль</th>
                <th>Права</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php  ?>
            <tr>
                <th scope="row">{{user.id}}</th>
                <td>{{user.username}}</td>
                <td>{{user.password}}</td>
                <td style="width: 200px">{{user.isAdmin}}</td>
                <td style="width: 50px">
                    <ul>
                        <li><a href="#" style="color: white; background: #333;">Редактировать</a></li>
                    </ul>
                </td>
                <td style="width: 30px">
                    <ul>
                        <li><a href="#" style="color: white; background: #333;">Удалить</a></li>
                    </ul>
                </td>
            </tr>
            {% endfor %}

            </tbody>
        </table>
    </div>
</div>
<footer class="container-fluid" style="z-index: 1">
    <a class="logo" href="http://www.rario.ru/">&copy; 2018 Агентство развития информационного общества РАРИО</a>
</footer>
</body>
</html>
{% endblock %}