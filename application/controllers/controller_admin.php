<?php
class Controller_admin extends Controller
{
    function action_users()
    {
        $user = new User();
        $users = $user->getAllUsers();
        $this->view->generate('admin_view.php', ['users' => $users]);
    }
    function action_index()
    {
        Auth::checkAuth();
        $this->view->generate('admin_view.php');
    }
    function action_login()
    {
        $this->view->generate('login_view.php');
    }
}