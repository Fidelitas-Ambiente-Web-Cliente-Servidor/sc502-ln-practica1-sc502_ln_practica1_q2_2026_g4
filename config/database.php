<?php

class Database
{
    public static function getConnection()
    {
        $host = "db";
        $database = "learnweb_db";
        $user = "root";
        $password = "root";

        try {
            return new PDO(
                "mysql:host=$host;dbname=$database;charset=utf8mb4",
                $user,
                $password
            );
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}