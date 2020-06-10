<?php

class News {
    private $db;
    private $table_name = "news";

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = "SELECT id, user_id, username, content, updated_at FROM news ORDER BY updated_at DESC";
    
        try {
            $stmt = $this->db->query($stmt);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch(PDOException $e) {
            exit($e->getMessage());
        }
    } 

    public function insert($user_id, $username, $content) {
        try {
            $stmt = $this->db->prepare("INSERT INTO news(user_id, username, content) VALUES(?, ?, ?)");
            $stmt->execute([
                $user_id,
                $username,
                $content
            ]);

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }
}