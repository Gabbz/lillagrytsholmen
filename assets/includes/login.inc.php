<?php

    include("db_connect.inc.php");

    if (isset($_POST['login_submit'])) {
        $username = htmlspecialchars(trim($_POST['username_login']));
        $password = htmlspecialchars(trim($_POST['password_login']));

        $feedback = $username . " " . $password;

        // Query som hämtar userID och lösenord från tabellen users där username är det som användaren skrivit in
        $query = "SELECT username, password, fullname, privilege FROM users WHERE username = (?)";

        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("s", $username);

            if ($stmt->execute()) {
                $stmt->bind_result($db_username, $db_password, $db_fullname, $db_privilege);
                $stmt->fetch();

                if (password_verify($password, $db_password)) {

                    //Sätter sessionsvariabler för senare användning
                    $_SESSION['username'] = $username;
                    $_SESSION['privilege'] = $db_privilege;
                    $_SESSION['fullname'] = $db_fullname;

                    $feedback = "Välkommen " . $_SESSION['fullname'];
                } else {
                    $feedback .= "Felaktigt lösenord eller användarnamn, försök igen!";
                }
                $stmt->close();
            } 
        }
    }
?>