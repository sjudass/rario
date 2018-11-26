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
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $user->updateUser($_POST['first_name'], $_POST['last_name'], $_POST['middle_name'], $_POST['login'], $_POST['password'], $_POST['position'], $id);
            $this->action_users();
        }
        else{
            $this->view->generate('user_view.php', ['getuser' => $getuser]);
        }
    }
    function action_adduser()
    {
        $user = new User();
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $user->addUser($_POST['first_name'], $_POST['last_name'], $_POST['middle_name'], $_POST['login'], $_POST['password'], $_POST['position']);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        $this->view->generate('adduser_view.php');
    }
    function action_deleteuser($id)
    {
        $user = new User();
        $user->deleteUser($id);
        http_redirect("/admin/users");
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