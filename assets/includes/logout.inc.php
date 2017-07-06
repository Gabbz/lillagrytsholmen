<?php

    session_save_path('tmp/');
    session_start();

    if (isset($_SESSION['username'])) {
        // Tar bort alla sessionsvariabler
        session_unset();

        // Förstör sessionen
        session_destroy();

        $_SESSION = [];

    }
    
    header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    exit();
?>