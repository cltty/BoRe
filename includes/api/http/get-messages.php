<?php

require '../config/database.php';
require '../models/message.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'GET': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $message = new Message($dbh);

        if(isset($_GET['history'])) {
            echo json_encode($message->findAll(true));
        } else {
            echo json_encode($message->findAll(false));
        }

    break;
        
    default: 
        http_response_code(400);
    break;

}

    