<?php

    session_start();

    //if (isset($_SESSION['username'])) {
        
        $_SESSION = [];

        session_destroy();

        session_start();

        $_SESSION["logged_out"] = "true";

    //}

    $feedback = "Du är nu utloggad.";
    $status = 0;

    echo "{\"feedback\": \"" . $feedback . "\",";
    echo "\"status\": \"" . $status . "\"}";
    
    //header("Location: /lillagrytsholmen/"); /* Redirect browser */
    //exit(); 
?>