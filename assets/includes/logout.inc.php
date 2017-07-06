<?php

    //session_save_path('tmp/');
    session_start();

    if (isset($_SESSION['username'])) {

        
        $_SESSION = array();

       /* if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        } */

        // Förstör sessionen
        session_destroy()


    }
    
    header("Location: /lillagrytsholmen.se/"); /* Redirect browser */
    exit();
?>