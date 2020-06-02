<?php
function redirect($page=FALSE, $message=NULL,$message_type=NULL){
    if(is_string($page)){
        $location = $page;
    }else{
        $location = $_SERVER['SCRIPT_NAME'];
    }

    if($message != NULL){
        // set message, 
        // first have to redirect then to display message
        // that's why message is stored in a session variable
        $_SESSION['message'] = $message;
    }

    if($message_type != NULL){
        $_SESSION['message_type'] = $message_type;
    }

    // now redirect
    header('Location: '.$location);
    exit;
}

function displayMessage(){
    if(!empty($_SESSION['message'])){
        // if message is set in session 
        $message = $_SESSION['message'];
        // check message type
        if(!empty($_SESSION['message_type'])){
            $message_type = $_SESSION['message_type'];
            // check whether its error or success
            if($message_type == 'error'){
                echo '<div class="alert alert-danger">'.$message.'</div>';
            }else{
                echo '<div class="alert alert-success">'.$message.'</div>';
            }
        }
        // unset message variables from session
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }else{
        echo '';
    }
}