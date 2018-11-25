<?php
class Application extends Model
{
    public function getAllApplications() {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->query('SELECT * FROM `application`');
        $result = $query->fetchAll();
        return $result;
    }

    public function getApplication($id) {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->prepare('SELECT * FROM application WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch();
    }

    public function deleteApplication($id) {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->prepare('DELETE FROM application WHERE id = ?');
        $query = $query->execute([$id]);
        return $query->fetch();
    }
}