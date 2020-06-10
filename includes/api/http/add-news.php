<?php

require '../config/database.php';
require '../models/news.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'POST': 
        header('Content-Type: application/json');
        $db = new Database();
        $dbh = $db->getConnection();
        $news = new News($dbh);
        
        $status = true;
        $messages = array();
       
        $user_id = isset($_POST['userID']) ? $_POST['userID'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        
        if(!$news->insert($user_id, $username, $content)) {
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
