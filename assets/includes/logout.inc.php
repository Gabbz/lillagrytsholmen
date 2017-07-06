<?php

    if (isset($_POST['logout_submit'])) {
        // Tar bort alla sessionsvariabler
        session_unset();

    // Förstör sessionen
        session_destroy();
    }
?>