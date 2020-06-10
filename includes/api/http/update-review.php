<?php

require '../config/database.php';
require '../models/book.php';
require '../models/news.php';

$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'POST': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $book = new Book($dbh);
        
        $status = true;
        $messages = array();
        
        $book_id = isset($_POST['bookID']) ? $_POST['bookID'] : '';
        $user_id = isset($_POST['userID']) ? $_POST['userID'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $book_name = isset($_POST['title']) ? $_POST['title'] : '';
        $author = isset($_POST['author']) ? $_POST['author'] : '';
        $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
        $read_pages = isset($_POST['pages']) ? $_POST['pages'] : '';
        $review = isset($_POST['review']) ? $_POST['review'] : '';

        if(!$book->update($book_id, $book_name, $author, $genre, $read_pages, $review)) {
            $status = false;
        } else {
            $status = true;
            
            $news = new News($dbh);
            $n = "Just updated his review for the book called " . $book_name .".";
            $news_added = $news->insert($user_id, $username, $n);
        }

        $dbh = null;
        $messages = json_encode($messages);
        echo json_encode(array(
            'status' => $status,
            'messages' => $messages
        ));
    break;
        
    default: 
        http_response_code(400);
    break;

}
