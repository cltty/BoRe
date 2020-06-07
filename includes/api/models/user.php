<?php

class User {
    private $db;
    private $table_name = "users";

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = "SELECT id, username, email FROM users;";
    
        try {
            $stmt = $this->db->query($stmt);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findById($id) {
        $stmt = "SELECT id, username, email FROM users WHERE id=?";
        
        try {
            $stmt = $this->db->prepare($stmt);
            $stmt->execute([
                $id
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function findByUsername($username) {
        $stmt = "SELECT id, username, password FROM users WHERE username=?";
        
        try {
            $stmt = $this->db->prepare($stmt);
            $stmt->execute([
                $username
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function findByEmail($email) {
        $stmt = "SELECT id, username, email FROM  users WHERE email=?";
        
        try {
            $stmt = $this->db->prepare($stmt);
            $stmt->execute([
                $email
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function insert($username, $password, $email) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users(username, password, email) VALUES(?, ?, ?)");
            $stmt->execute([
                $username,
                password_hash($password, PASSWORD_DEFAULT),
                $email
            ]);

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }
}