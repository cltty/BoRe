<?php

require '../config/database.php';
require '../models/book.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'GET': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $book = new Book($dbh);
        
        if(isset($_GET['userID'])) {
            echo json_encode($book->findByUserId($_GET['userID']));
        } else {
            if(isset($_GET['id'])) {
                echo json_encode($book->findById($_GET['id']));
            }
            else {
                if("true" == $_GET['all']) {  
                    echo json_encode($book->findAll(true));
                } else {
                    echo json_encode($book->findAll(false));
                }
            }
        }
    break;
    default: 
        http_response_code(400);
    break;

}
