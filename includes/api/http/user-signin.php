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
        $passwordRepeat = isset($_POST['passwordRepeat']) ? $_POST['passwordRepeat'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';

        if(empty($username)) {
            $status = false;
            $messages[] = "Username cannot be empty!";
        } else {
            if(!preg_match("/^[a-zA-Z0-9]*_?[a-zA-Z0-9]*$/", $username)) {
                $status = false;
                $messages[] = "Forbidden characters used for username!";
            }
            $usernameExits = $user->findByUsername($username);
            if($usernameExits) {
                $status = false;
                $messages[] = "Username already in use!";
            }
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
                $messages[] = "Password should contain at least one number, at least one uppercase letter, and length > 8";
            }
        }
        
        if(empty($passwordRepeat)) {
            $status = false;
            $messages[] = "You must repeat password!";
       
        }
       
        if(empty($email)) {
            $status = false;
            $messages[] = "Email cannot be empty!";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status = false;
                $messages[] = "Email address '$email' is considered invalid.\n";
            }

            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
                $status = false;
                $messages[] = "Invalid email address!";
            }
            
            $emailExits = $user->findByEmail($email);
            if($emailExits) {
                $status = false;
                $messages[] = "Email address already in use!";
                $dbh = null;
            }
        }

        if($status) {
            if(!$user->insert($username, $password, $email)) {
                $status = 0;
                $messages[] = "Database error.Try again later!";
            }
        } 

        $dbh = null;
        
        echo json_encode(array (
            'status' => $status,
            'messages' => $messages
        ));
    break;
    default: 
        http_response_code(400);
    break;
}
