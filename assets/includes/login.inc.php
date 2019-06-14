<?php
    session_start();
    include("db_connect.inc.php");

    $feedback = "Någonting, gick fel! :( Försök igen eller kontakta administratör!";
    $status = "0";

    $username = htmlspecialchars(trim($_POST['username_login']));
    $password = htmlspecialchars(trim($_POST['password_login']));

    // Query som hämtar userID och lösenord från tabellen users där username är det som användaren skrivit in
    $query = "SELECT * FROM users WHERE username = (?)";

    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $stmt->bind_result($db_username, $db_password, $db_fullname, $db_phone, $db_email, 
                $db_adress, $db_postal, $db_city, $db_privilege);
            $stmt->fetch();

            if (password_verify($password, $db_password)) {

                //Sätter sessionsvariabler för senare användning
                $_SESSION['username'] = $username;
                $_SESSION['privilege'] = $db_privilege;
                $_SESSION['fullname'] = $db_fullname;
                $_SESSION['phone'] = $db_phone;
                $_SESSION['email'] = $db_email;
                $_SESSION['adress'] = $db_adress;
                $_SESSION['postal'] = $db_postal;
                $_SESSION['city'] = $db_city;
                

                $feedback = "Välkommen " . $_SESSION['fullname'] . "!";
            } else {
                $feedback = "Felaktigt lösenord eller användarnamn, försök igen!";
                $status = "401";
            }
            $stmt->close();
        } 
    }

    echo "{\"feedback\": \"" . $feedback . "\",";
    echo "\"userName\": \"" . $_SESSION['username'] . "\",";
    echo "\"fullName\": \"" . $_SESSION['fullname'] . "\",";
    echo "\"phone\": \"" . $_SESSION['phone'] . "\",";
    echo "\"email\": \"" . $_SESSION['email'] . "\",";
    echo "\"adress\": \"" . $_SESSION['adress'] . "\",";
    echo "\"postal\": \"" . $_SESSION['postal'] . "\",";
    echo "\"city\": \"" . $_SESSION['city'] . "\",";
    echo "\"status\": \"" . $status . "\"}";
    
?>