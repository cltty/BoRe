<?php

class Message {
    private $db;
    private $table_name = "messages";

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll($history) {
        if($history == true) {
            $stmt = "SELECT user_id, username, message, created_at 
            FROM messages
            ORDER BY created_at DESC";
        } else {
            $stmt = "SELECT user_id, username, message, created_at
            FROM messages
            ORDER BY created_at DESC
            LIMIT 10";
        }
    
        try {
            $stmt = $this->db->query($stmt);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    }

    
    public function findByUserId($id) {
        $stmt = "SELECT id, book_name, author, genre, read_pages, review, updated_at FROM books WHERE id=?";
        
        try {
            $stmt = $this->conn->prepare($stmt);
            $stmt->execute([
                $id
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;

        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    } 

    public function insert($user_id, $username, $msg) {
        try {
            $stmt = $this->db->prepare("INSERT INTO messages(user_id, username, message) VALUES(?, ?, ?)");
            $stmt->execute([
                $user_id,
                $username,
                $msg,
            ]);

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }
}