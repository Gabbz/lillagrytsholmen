<?php

    include("db_connect.inc.php");

    if (isset($_POST['admin_submit'])) {
        $admin_username = htmlspecialchars(trim($_POST['admin_username']));
        $admin_password = htmlspecialchars(trim($_POST['admin_password']));

        $query = "SELECT username, password, privilege FROM user WHERE username = (?)";

        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $admin_username);

            if ($stmt->execute()) {
                $stmt->bind_result($db_username, $db_password, $db_privilege);
                $stmt->fetch();

                if (password_verify($admin_password, $db_password)) {

                    //Sätter sessionsvariabler för senare användning
                    $_SESSION['username'] = $admin_username;
                    $_SESSION['privilege'] = $db_privilege;

                    $feedback = "Admininloggningen lyckades!";
                } else {
                    $feedback = "Felaktigt lösenord eller användarnamn, försök igen!";
                }
                $stmt->close();
            } 
        }
    }
?>