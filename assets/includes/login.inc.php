<?php
include("db_connect.inc.php");

if (isset($_POST['login_submit'])) {
    $username = htmlspecialchars(trim($_POST['username_login']));
    $password = htmlspecialchars(trim($_POST['password_login']));

    // Query som hämtar userID och lösenord från tabellen users där username är det som användaren skrivit in
    $query = "SELECT userID, password FROM users WHERE username = (?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $stmt->bind_result($userID, $db_password);
            $stmt->fetch();

            // Här skulle jag vilja använda password hash eller hash_equals
            // Krypterar lösenordet för att kunna jämföra med databasens hashade lösenord
            if (strcmp($db_password, crypt($password, '$5$rounds=5000$[B3n!7WuyPq;$Y_"$')) == 0) {

                //Sätter sessionsvariabler för senare användning
                $_SESSION['username'] = $username;
                $_SESSION['userID'] = $userID;
                $_SESSION['logged_in'] = "YES";
            } else {
                $feedback = "Incorrect username or password. Please try again.";
            }
            $stmt->close();
        }
    }
}
?>