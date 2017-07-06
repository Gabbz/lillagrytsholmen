<?php

    session_save_path('tmp/');
    session_start();

    //if (isset($_SESSION['username'])) {
        
        // Förstör sessionen
        if (session_destroy()) {
            echo "True!";
        }

        // Tar bort alla sessionsvariabler
        session_unset();


        echo $_SESSION['username'];



        $_SESSION = [];

    //}
    
    //header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    //exit();
?>