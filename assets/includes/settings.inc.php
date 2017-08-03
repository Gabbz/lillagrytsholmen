<?php
    include('db_connect.inc.php');

    if (isset($_POST['settings_submit']) && $_SESSION['privilege'] == 0) {
        $password_encrypt = "";
        $skip = 0;

        $settings_username = htmlspecialchars(trim($_POST['settings_username']));
        $settings_password = htmlspecialchars(trim($_POST['settings_password']));
        $settings_password2 = htmlspecialchars(trim($_POST['settings_password2']));
        $settings_fullname = htmlspecialchars(trim($_POST['settings_fullname']));
        $settings_phone = htmlspecialchars(trim($_POST['settings_phone']));
        $settings_email = htmlspecialchars(trim($_POST['settings_email']));
        $settings_adress = htmlspecialchars(trim($_POST['settings_adress']));
        $settings_postal = htmlspecialchars(trim($_POST['settings_postal']));
        $settings_city = strtoupper(htmlspecialchars(trim($_POST['settings_city'])));

        if ($settings_password != "") {
            if ($settings_password === $settings_password2) {
                $password_encrypt = password_hash($settings_password, PASSWORD_DEFAULT); // Encrypted Password
            } else {
                $feedback = "Lösenorden matchade inte, försök igen";
                $skip = 1;
            }
        }

        if (strlen($settings_username) > 3 && 
            strlen($settings_fullname) > 4 && 
            strlen($settings_phone) == 10 && 
            strlen($settings_email) > 5 &&
            strlen($settings_adress) > 3 && 
            strlen($settings_postal) == 5 && 
            strlen($settings_city) > 2 &&
            $skip != 1) {

            // Query som skapar en ny användare i databasen
            if ($password_encrypt != "") {
                $query = "UPDATE users SET username = (?), 
                    password = (?), 
                    fullname = (?), 
                    phone = (?), 
                    email = (?), 
                    adress = (?), 
                    postal = (?), 
                    city = (?) 
                    WHERE username = (?)";
            } else {
                $query = "UPDATE users SET username = (?),
                    fullname = (?), 
                    phone = (?), 
                    email = (?), 
                    adress = (?), 
                    postal = (?), 
                    city = (?) 
                    WHERE username = (?)";
            }

            if ($stmt = $mysqli->prepare($query)) {
            
                if ($password_encrypt != "") {
                    $stmt->bind_param("ssssssiss", 
                    $settings_username, 
                    $password_encrypt, 
                    $settings_fullname, 
                    $settings_phone, 
                    $settings_email, 
                    $settings_adress, 
                    $settings_postal, 
                    $settings_city, 
                    $_SESSION['username']);
                } else {
                    $stmt->bind_param("sssssiss", 
                    $settings_username, 
                    $settings_fullname, 
                    $settings_phone, 
                    $settings_email, 
                    $settings_adress, 
                    $settings_postal, 
                    $settings_city, 
                    $_SESSION['username']);
                }

                if ($stmt->execute()) {

                    $_SESSION['username'] = $settings_username;
                    $_SESSION['fullname'] = $settings_fullname;
                    $_SESSION['phone'] = $settings_phone;
                    $_SESSION['email'] = $settings_email;
                    $_SESSION['adress'] = $settings_adress;
                    $_SESSION['postal'] = $settings_postal;
                    $_SESSION['city'] = $settings_city;
                    
                    $feedback = "Dina personliga inställningar är uppdaterade!";
                } else {
                    $feedback = "Någonting, gick fel! :( Försök igen eller kontakta administratör!";
                }
                $stmt->close();
            } 
        } 
    }
?>

