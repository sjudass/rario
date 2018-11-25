<?php
    class User extends Model
    {
        public function getAllUsers() {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->query('SELECT * FROM user');
            $result = $query->fetchAll();
            return $result;
        }

        public function getUser($id) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('SELECT * FROM user WHERE id = ?');
            $query->execute([$id]);
            return $query->fetch();
        }

        public function addUser($username, $password) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('INSERT INTO user (username, password, isAdmin) VALUES (?,?,0)');
            $query->execute([$username, $password]);
            return $query->fetch();
        }

        public function deleteUser($id) {
            $db = new Database();
            $db = $db->connectToPDO();
            $query = $db->prepare('DELETE FROM user WHERE id = ?');
            $query = $query->execute([$id]);
            return $query->fetch();
        }
    }