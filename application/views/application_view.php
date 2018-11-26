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
            <li><a class="active" style="margin-top: -195px">Управление Заявками</a></li>
            <li><a href="/admin/adduser" style="margin-top: -345px">Добавить пользователя</a></li>
        </ul>
    </nav>
    <div class="col-md-9 table-container">
        <table class="table table-hover">
            <thead class="table-active">
            <tr>
                <th>#</th>
                <th>Вид услуги</th>
                <th>Текст обращения</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Дата закрытия</th>
                <th>Код клиента</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php if( isset($applications) && is_array($applications) ) {foreach ($applications as $application):?>
                <tr>
                    <th scope="row"><?= $application['id'];?></th>
                    <td><?= $application['service'];?></td>
                    <td><?= $application['application_text'];?></td>
                    <td><?= $application['data_create'];?></td>
                    <td><?= $application['status'];?></td>
                    <td><?= $application['closing_date'];?></td>
                    <td><?= $application['client'];?></td>
                    <td style="width: 50px">
                        <button href="#" type="submit" class="btn btn-dark btn-lg pull-right button-submit">Редактировать</button>
                    </td>
                    <td style="width: 30px">
                        <button href="#" type="submit" class="btn btn-dark btn-lg pull-right button-submit">Удалить</button>
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