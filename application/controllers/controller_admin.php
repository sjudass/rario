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
                switch ($_POST['status']){
                    case "Выполнена":
                        $application->updateApplication($_POST['status'],date("d.m.y"),$id);
                        mail($getapplication[0]['email'], "Агентство развития информационного общества РАРИО", "Добрый день," . $getapplication[0]['last_name'] ." ". $getapplication[0]['first_name'] ." ". $getapplication[0]['middle_name'] .
                            ".\nЗаявка, отправленная вами, успешно выполнена.\nДля получения детальной информации позвоните по телефону: 8 (495) 627 6296.\nСпасибо за обращение.\n\n\n\nСообщение отправлено с сайта: http://rario.ru");
                        header("location: http://rario/admin/applications");
                        break;
                    case "Поступила":
                        header("location: http://rario/admin/applications");
                        break;
                    case "На рассмотрении":
                        $application->updateApplication($_POST['status'],'',$id);
                        mail($getapplication[0]['email'], "Агентство развития информационного общества РАРИО", "Добрый день," . $getapplication[0]['last_name'] ." ". $getapplication[0]['first_name'] ." ". $getapplication[0]['middle_name'] .
                            ".\nЗаявка, которую вы нам отправили, находится на рассмотрении.\nВ ближайшее время сотрудники агентства свяжуться с вами по номеру телефона.\nСпасибо за обращение.\n\n\n\nСообщение отправлено с сайта: http://rario.ru");
                        header("location: http://rario/admin/applications");
                        break;
                    case "Отказано":
                        $application->updateApplication($_POST['status'],date("d.m.y"),$id);
                        mail($getapplication[0]['email'], "Агентство развития информационного общества РАРИО", "Добрый день," . $getapplication[0]['last_name'] ." ". $getapplication[0]['first_name'] ." ". $getapplication[0]['middle_name'] .
                            ".\nЗаявка, с которой вы к нам обратились, отклонена.\nДля получения детальной информации обратитесь по номеру телефона: 8 (495) 627 6296.\n\n\n\nСообщение отправлено с сайта: http://rario.ru");
                        header("location: http://rario/admin/applications");
                        break;
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