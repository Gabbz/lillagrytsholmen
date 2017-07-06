<?php

    //if (isset($_SESSION['username'])) {
        // Tar bort alla sessionsvariabler
        session_unset();

        // Förstör sessionen
        session_destroy();
    //}
    
    header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    exit();
?>