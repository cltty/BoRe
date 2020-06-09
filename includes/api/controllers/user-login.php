<?php

require '../models/user.php';
require '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];
    
switch($method) {
    case 'POST': 
        $db = new Database();
        $dbh = $db->getConnection();
        $user = new User($dbh);

        $status = true;
        $messages = array();
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        
        if(empty($username)) {
            $status = false;
            $messages[] = "Username cannot be empty!";
        }
        
        if(empty($password)) {
            $status = false;
            $messages[] = "Password cannot be empty!";
        } else {
            /*
                Password requirements: 
                  should contain at least one number
                  should contain at least one letter
                  minimum 9 chs.
            */
            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                $status = false;
                $messages[] = "Forbidden characters used for password!";
            }
        }

        if($status) {
            $results = $user->findByUsername($username);
            if(!$results) {
                $status = false;
                $messages[] = "This username does not exists!";
            } else {
                foreach($results as $row) {
                    if(!password_verify($password, $row['password'])) {
                        $status = false;
                        $messages[] = "Password does not match!";
                    }
                }
                if($status) {
                    $messages['userID'] = $results[0]['id'];
                }
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

    

