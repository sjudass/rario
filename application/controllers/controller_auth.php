<?php
class Controller_Auth extends Controller
{
    function action_login()
    {
        Auth::checkAuth();
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $user = Auth::login($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: http://mymvc.local:81');
            }
        }
        $this->view->generate('login_view.php');
    }
    function action_register()
    {
        Auth::checkAuth();
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $user = new User();
            $user->addUser($_POST['username'], $_POST['password']);
            $user = Auth::login($_POST['username'], $_POST['password']);
            $_SESSION['user'] = $user;
            header('Location: http://mymvc.local:81');
        }
        $this->view->generate('register_view.php');
    }

    function action_logout()
    {
        session_destroy();
        return header('Location: http://mymvc.local:81');
    }
}