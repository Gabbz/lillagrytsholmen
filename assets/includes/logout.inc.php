<?php

    $feedback = "Du är nu utloggad!";

    session_start();

    if (isset($_SESSION['username'])) {

        
        $_SESSION = array();

        session_destroy();

    }
    
    header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    exit();
?>