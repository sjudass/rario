<?php
class Auth
{
    public static function login($username, $password) {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->prepare('SELECT * FROM user WHERE username = ?');
        $query->execute([$username]);
        $result = $query->fetch();
        if ($result["password"] == $password) {
            return $result;
        }
        else {
            return null;
        }
    }

    public static function checkAuth() {
        if (isset($_SESSION['admin'])) {
            header('Location: http://rario/admin');
        }
        else{
            header('Location: http://rario/admin/login');
        }
    }
}
