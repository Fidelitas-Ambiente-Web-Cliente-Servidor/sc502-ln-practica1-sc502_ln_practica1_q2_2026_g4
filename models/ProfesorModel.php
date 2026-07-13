<?php

require_once __DIR__ . '/../config/database.php';

class ProfesorModel
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM profesores
                WHERE activo = 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT *
                FROM profesores
                WHERE id = ?
                AND activo = 1";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}