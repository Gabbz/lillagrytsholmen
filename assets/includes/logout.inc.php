<?php

    session_save_path('tmp/');
    session_start();

    //if (isset($_SESSION['username'])) {
        
        // Förstör sessionen
        session_destroy();

        // Tar bort alla sessionsvariabler
        session_unset();


        echo "Inne!";


        $_SESSION = [];

    //}
    
    //header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    //exit();
?>