<?php


class Message {
    private $db;
    private $table_name = "messages";

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll() {
        $stmt = "SELECT user_id, book_name, author, genre, read_pages, review, update_at FROM books";
    
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

    public function insert($user_id, $book_name, $author, $genre, $read_pages, $review) {
        try {
            $stmt = $this->db->prepare("INSERT INTO books(user_id, book_name, author, genre, read_pages, review) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $user_id,
                $book_name,
                $author,
                $genre,
                $read_pages,
                $review
            ]);

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }
}