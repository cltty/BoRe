<?php


class Book {
    private $db;
    private $table_name = "books";

    public function __construct($db) {
        $this->db = $db;
    }

    public function findAll($all) {
        if($all == true) {
            $stmt = "SELECT user_id, book_name, author, genre, read_pages, review, updated_at FROM books";
        } else {
            $stmt = "SELECT user_id, book_name, author, genre, read_pages, review, updated_at 
            FROM books
            ORDER BY updated_at DESC
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
        $stmt = "SELECT id, book_name, author, genre, read_pages, review, updated_at FROM books WHERE user_id=?";
        
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

    public function findById($id) {
        $stmt = "SELECT id, book_name, author, genre, read_pages, review, updated_at FROM books WHERE id=?";
        
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

    public function update($id, $book_name, $author, $genre, $read_pages, $review) {
        try {
            $stmt = $this->db->prepare("UPDATE books
                SET book_name = ?, author = ?, genre = ?, read_pages = ?, review = ?
                WHERE id = ?
            ");
            $stmt->execute([
                $book_name,
                $author,
                $genre,
                $read_pages,
                $review,
                $id
            ]);

            return 1;
        } catch(PDOException $e) {
            return 0;
        }
    }
}