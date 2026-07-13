<?php

require_once __DIR__ . '/../config/database.php';

class CursoModel
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getConnection();
    }

    /**
     * Para pbetener  los cursos registrados en la base de datos.
     */
    public function getAll(): array
    {
        $sql = "
            SELECT
                id,
                nombre,
                descripcion,
                categoria,
                duracion,
                precio,
                imagen
            FROM cursos
            ORDER BY nombre ASC
        ";

        $statement = $this->connection->prepare($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    
    public function getByCategoria(string $categoria): array
    {
        $sql = "
            SELECT
                id,
                nombre,
                descripcion,
                categoria,
                duracion,
                precio,
                imagen
            FROM cursos
            WHERE categoria = :categoria
            ORDER BY nombre ASC
        ";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            ':categoria' => $categoria
        ]);

        return $statement->fetchAll();
    }
}
