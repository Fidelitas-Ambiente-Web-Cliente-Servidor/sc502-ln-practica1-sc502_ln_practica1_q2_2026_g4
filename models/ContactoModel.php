<?php

require_once __DIR__ . '/../config/database.php';

class ContactoModel
{
    private PDO $connection;
    public function __construct()
    {
        $this->connection = Database::getConnection();
    }
    public function create(
        string $nombre,
        string $correo,
        string $telefono,
        string $asunto,
        string $mensaje
    ): bool {
        $sql = "
            INSERT INTO contacto (
                nombre,
                correo,
                telefono,
                asunto,
                mensaje
            ) VALUES (
                :nombre,
                :correo,
                :telefono,
                :asunto,
                :mensaje
            )
        ";
        $statement = $this->connection->prepare($sql);
        return $statement->execute([
            ':nombre' => $nombre,
            ':correo' => $correo,
            ':telefono' => $telefono,
            ':asunto' => $asunto,
            ':mensaje' => $mensaje
        ]);
    }
}