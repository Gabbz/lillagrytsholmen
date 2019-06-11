<?php

    session_start();

    if (isset($_SESSION['username'])) {
        
        $_SESSION = array();

        session_destroy();

    }

    $feedback = "Du är nu utloggad.";
    
    header("Location: /lillagrytsholmen/"); /* Redirect browser */
    exit();
?>