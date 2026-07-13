<?php

require_once __DIR__ . '/../config/database.php';

class ProfesorModel
{

    private PDO $connection;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {

        $sql = "SELECT * FROM profesores
                WHERE activo = 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getById($id)
    {

        $sql = "SELECT *
                FROM profesores
                WHERE id = ?
                AND activo = 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}