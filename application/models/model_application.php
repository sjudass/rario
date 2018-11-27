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
        $query = $db->prepare('SELECT application.id, application.service, application.application_text, application.data_create, application.status, application.closing_date, application.client, clients.first_name, clients.last_name, clients.middle_name, clients.email, clients.phone FROM application JOIN clients ON application.client = clients.id WHERE application.id = ?');
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function deleteApplication($id) {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->prepare('DELETE FROM application WHERE id = ?');
        $query->execute([$id]);
        return $query->fetch();
    }

    public function updateApplication($status, $closing_date, $id)
    {
        $db = new Database();
        $db = $db->connectToPDO();
        $query = $db->prepare('UPDATE application SET status = ?, closing_date = ? WHERE id = ?');
        $query->execute([$status, $closing_date, $id]);
        return $query->fetch();
    }
}