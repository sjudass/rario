<?php
    class User extends Model
    {
        public function getAllUsers() {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->query('SELECT * FROM `worker`');
            $result = $query->fetchAll();
            return $result;
        }

        public function getUser($id) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('SELECT * FROM `worker` WHERE id = ?');
            $query->execute([$id]);
            return $query->fetchall();
        }

        public function addUser($first_name, $last_name, $middle_name, $login, $password, $position) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('INSERT INTO worker (first_name, last_name, middle_name, login, password, position) VALUES (?,?,?,?,?,?)');
            $query->execute([$first_name, $last_name, $middle_name, $login, $password, $position]);
            return $query->fetch();
        }
        public function updateUser($first_name, $last_name, $middle_name, $login, $password, $position, $id)
        {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('UPDATE worker SET first_name = ?, last_name = ?, middle_name = ?, login = ?, password = ?, position = ? WHERE id = ?');
            $query->execute([$first_name, $last_name, $middle_name, $login, $password, $position, $id]);
            return $query->fetch();
        }
        public function deleteUser($id) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('DELETE FROM worker WHERE id = ?');
            $query->execute([$id]);
            return $query->fetch();
        }
    }