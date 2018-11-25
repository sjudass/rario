<?php
class Controller_admin extends Controller
{
    function action_users()
    {
        $user = new User();
        $users = $user->getAllUsers();
        $this->view->generate('users_view.php', ['users' => $users]);
    }
    function action_user($id)
    {
        $user = new User();
        $getuser = $user->getUser($id);
        $this->view->generate('user_view.php', ['getuser' => $user]);
    }
    function action_application()
    {
        $application = new Application();
        $applications = $application->getAllApplications();
        $this->view->generate('application_view.php', ['applications' => $applications]);
    }
    function action_index()
    {
        Auth::checkAuth();
        $this->view->generate('admin_view.php');
    }
    function action_login()
    {
        Auth::checkAuth();
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $admin = Auth::login($_POST['login'], $_POST['password']);
            if ($admin) {
                $_SESSION['admin'] = $admin;
                header('Location: http://rario/admin');
            }
        }
        $this->view->generate('login_view.php');
    }
}