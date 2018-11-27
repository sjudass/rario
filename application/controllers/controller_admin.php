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
    function action_application($id)
    {
        $application = new Application();
        $getapplication = $application->getApplication($id);
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if ($_POST['status'] == "Выполнена"){
                $application->updateApplication($_POST['status'],date("d.m.y"),$id);
                header("location: http://rario/admin/applications");
            }
            elseif ($_POST['status'] == "Поступила"){
                header("location: http://rario/admin/applications");
            }
            else
            {
                $application->updateApplication($_POST['status'],'',$id);
                header("location: http://rario/admin/applications");
            }
        }
        else{
            $this->view->generate('application_view.php', ['getapplication' => $getapplication]);
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
        header("location: http://rario/admin/users");
    }
    function action_applications()
    {
        $application = new Application();
        $applications = $application->getAllApplications();
        $this->view->generate('applications_view.php', ['applications' => $applications]);
    }
    function action_deleteapplication($id)
    {
        $application = new Application();
        $application->deleteApplication($id);
        header("location: http://rario/admin/applications");
    }
    function action_index()
    {
        Auth::checkAuth();
        $this->view->generate('admin_view.php');
    }
    function action_login()
    {
        Auth::checklogin();
        if ($_SERVER["REQUEST_METHOD"] == 'POST'){
            $admin = Auth::login($_POST['login'], $_POST['password']);
            if ($admin) {
                $_SESSION['admin'] = $admin;
                header('Location: http://rario/admin');
            }
        }
        $this->view->generate('login_view.php');
    }
    function action_logout()
    {
        session_destroy();
        header('Location: http://rario/admin/login');
    }
}