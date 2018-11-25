{% extends "template_view.php" %}

{% block content %}

<style>
    .bg-cover {
        background-image: url('/images/jumbotron.jpg');
        height: 783px;
    }
    overflow-y: hidden;
</style>
<link href="/css/blog.css" rel="stylesheet">
<div class="container-fluid bg-cover">
    <form class="form-signin" role="form" method="post" action="/auth/login">
        <h2 class="form-signin-heading" style="text-align: center; font-size: 3rem">Авторизация</h2>
        <input type="email" class="form-control" name="username" placeholder="Email" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="font-size: 2.25rem; margin-top: 15px">Войти</button>
    </form>
</div>

{% endblock %}