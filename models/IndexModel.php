<?php

require_once __DIR__ . "/../config/database.php";

class IndexModel
{
    private PDO $conexion;

    public function __construct()
    {
        $this->conexion = Database::getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM cursos_destacados";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}