<?php

    if (isset$_SESSION['username'])) {
        // Tar bort alla sessionsvariabler
        session_unset();

    // Förstör sessionen
        session_destroy();
    }
    echo '<script>(function (){window.location.href = "/lillagrytsholmen.se/index.php";}();</script>';
?>