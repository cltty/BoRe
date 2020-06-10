<?php

require '../config/database.php';
require '../models/message.php';
$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'POST':
        $db = new Database();
        $dbh = $db->getConnection();
        $message = new Message($dbh);

        $status = true;
        $messages = array();
        
        $user_id = isset($_POST['userID']) ? $_POST['userID'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $msg = isset($_POST['message']) ? $_POST['message'] : '';
        
        if(empty($user_id)) {
            $status = false;
            $messages[] = "Request error.Try again later!";
        }

        if(empty($username)) {
            $status = false;
            $messages[] = "Request error.Try again later!";
        }
        
        if(empty($msg)) {
            $status = false;
            $messages[] = "Request error.Try again later!";
        }

        if($status) {
            $results = $message->insert($user_id, $username, $msg);

            if(!$results) {
                $status = false;
                $messages[] = "Database error!";
            }
        }

        $dbh = null;
        echo json_encode(array(
            'status' => $status,
            'messages' => $messages
        ));
    break;
        
    default: 
        http_response_code(400);
    break;

}

    