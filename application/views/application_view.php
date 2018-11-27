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
            <li><a class="active">Управление Заявками</a></li>
            <li><a href="/admin/adduser">Добавить пользователя</a></li>
            <li><a href="/admin/logout" style="margin-top: 447px">Выход</a></li>
        </ul>
    </nav>
    <?php if (isset($getapplication)) foreach ($getapplication as $application):?>
        <form method="post" action="/admin/application/<?= $application['id'];?>" class="col-sm-9">
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-sm-6 contact-form">
                        <br>
                        <h1>Информация о клиенте</h1>
                        <label class="h3">Имя: <?= $application['first_name'];?></label><br>
                        <label class="h3">Фамилия: <?= $application['last_name'];?></label><br>
                        <label class="h3">Отчество: <?= $application['middle_name'];?></label><br>
                        <label class="h3">Email: <?= $application['email'];?></label><br>
                        <label class="h3">Номер телефона: <?= $application['phone'];?></label>
                    </div>
                    <div class="form-group col-sm-6 contact-form">
                        <br>
                        <h1>Информация о заявке</h1>
                        <label class="h3">Вид услуги: <?= $application['service'];?></label><br>
                        <label class="h3">Дата обращения: <?= $application['data_create'];?></label><br>
                        <label class="h3">Текст обращения</label><br>
                        <pre style="font-size: 1.2em"><?= $application['application_text'];?></pre>
                        <?php if ($application['status'] == "Выполнена"):?>
                            <label class="h3">Дата закрытия: <?= $application['closing_date'];?></label>
                            <div class="form-group submit">
                                <a href="/admin/applications" class="btn btn-dark btn-lg pull-right button-submit">Назад</a>
                            </div>
                        <?php else:?>
                        <label class="h3">Статус обращения</label><br>
                        <select type="text" name="status" class="form-control" id="status" style="height: 30px">
                            <option><?= $application['status'];?></option>
                            <option>На рассмотрении</option>
                            <option>Выполнена</option>
                            <option>Отказано</option>
                        </select><br>
                            <div class="form-group submit">
                                <button id="form-submit" class="btn btn-dark btn-lg pull-right button-submit">Внести изменения</button>
                                <a href="/admin/applications" class="btn btn-dark btn-lg pull-right button-submit">Назад</a>
                            </div>
                        <?php endif;?>
                    </div>

                </div>
            </div>
        </form>
    <? endforeach;?>
</div>
<footer class="container-fluid" style="z-index: 1">
    <a class="logo" href="http://www.rario.ru/">&copy; 2018 Агентство развития информационного общества РАРИО</a>
</footer>
</body>
</html>