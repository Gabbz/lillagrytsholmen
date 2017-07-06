<?php

    if (isset($_SESSION['username'])) {
        // Tar bort alla sessionsvariabler
        session_unset();

    // Förstör sessionen
        session_destroy();
    }
    
    header("Location: /lillagrytsholmen.se/index.php"); /* Redirect browser */
    exit();

    //echo '<script>(function (){window.location.href = "/lillagrytsholmen.se/index.php";}();</script>';
?>