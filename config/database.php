<?php

class Database
{
    private static ?PDO $connection = null;

    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            $host = 'db';
            $database = 'learnweb_db';
            $user = 'root';
            $password = 'root';
            $charset = 'utf8mb4';

            $dsn = "mysql:host={$host};dbname={$database};charset={$charset}";

            try {
                self::$connection = new PDO(
                    $dsn,
                    $user,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false
                    ]
                );
            } catch (PDOException $e) {
                throw new RuntimeException(
                    'No fue posible conectar con la base de datos.'
                );
            }
        }

        return self::$connection;
    }
}