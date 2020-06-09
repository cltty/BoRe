<?php

require '../config/database.php';
require '../models/news.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'GET': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $news = new News($dbh);

        echo json_encode($news->findAll());

    break;
        
    default: 
        http_response_code(400);
    break;

}

    