<?php

    include("db_connect.inc.php");

    if (isset($_POST['admin_submit'])) {
        $admin_username = htmlspecialchars(trim($_POST['admin_username']));
        $admin_password = htmlspecialchars(trim($_POST['admin_password']));

        // Query som hämtar userID och lösenord från tabellen users där username är det som användaren skrivit in
        $query = "SELECT username, password, privilege FROM admin WHERE username = (?)";

        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $admin_username);

            if ($stmt->execute()) {
                $stmt->bind_result($db_username, $db_password, $db_privilege);
                $stmt->fetch();

                if (password_verify($admin_password, $db_password)) {

                    //Sätter sessionsvariabler för senare användning
                    $_SESSION['username'] = $admin_username;
                    $_SESSION['privilege'] = $db_privilege;

                    $feedback = "Inloggningen lyckades!";
                } else {
                    $feedback = "Felaktigt lösenord eller användarnamn, försök igen!";
                }
                $stmt->close();
            } 
        }
    }
?>