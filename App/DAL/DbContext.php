<?php

/*
 * Class for operating DataBase
 */

class DbContext
{
    protected string $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;

    public function connectDb()
    {
        try {
            // Create PDO instance
            $pdo = new PDO($this->dsn, DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

            return $pdo;
        } catch (PDOException $e) {
            die('Database error: ' . $e->getMessage());
        }
    }
}