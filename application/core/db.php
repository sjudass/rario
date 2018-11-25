<?php
class Database
{
    public $host = '127.0.0.1';

    public $db = 'rario';

    public $user = 'root';

    public $password = '';

    public $charset = "utf8";

    public $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function getPDOString() {
        return "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset . ";";
    }

    public  function connectToPDO(){
        return new PDO($this->getPDOString(), $this->user, $this->password);
    }
}