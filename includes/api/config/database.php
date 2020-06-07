<?php

class Database {
    private $host = "localhost";
    private $db_name = "bookreview";
    private $username = "root";
    private $password = "";
    private $port = 3308;
    public $conn;

    private function __clone() {
        throw new Exception("Cannot clone a singleton");
    }

    public function getConnection() {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=bookreview;port=3308','root', '');//to modify
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}