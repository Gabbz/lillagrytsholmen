<?php

    session_start();

    //if (isset($_SESSION['username'])) {
        
        $_SESSION = [];
        


        session_destroy();

        $_SESSION["logged_out"] = "true";

        //session_start();

        

    //}

    $feedback = "Du är nu utloggad.";
    $status = 0;

    echo "{\"feedback\": \"" . $feedback . "\",";
    echo "\"status\": \"" . $status . "\"}";
    
    //header("Location: /lillagrytsholmen/"); /* Redirect browser */
    //exit(); 
?>