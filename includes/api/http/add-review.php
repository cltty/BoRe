<?php

require '../config/database.php';
require '../models/book.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'POST': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $message = new Book($dbh);
        
        $status = true;
        $messages = array();
       
        $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
        $book_name = isset($_POST['title']) ? $_POST['title'] : '';
        $author = isset($_POST['author']) ? $_POST['author'] : '';
        $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
        $read_pages = isset($_POST['read_pages']) ? $_POST['read_pages'] : '';
        $review = isset($_POST['review']) ? $_POST['review'] : '';

        if(!$message->insert($user_id, $book_name, $author, $genre, $read_pages, $review)) {
            $status = false;
        } else {
            $status = true;
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
