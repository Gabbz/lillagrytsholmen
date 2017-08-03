<?php
    include('db_connect.inc.php');

    if (isset($_POST['register_submit']) && $_SESSION['privilege'] == 1) {
        $register_username = htmlspecialchars(trim($_POST['register_username']));
        $register_password = htmlspecialchars(trim($_POST['register_password']));
        $register_fullname = htmlspecialchars(trim($_POST['register_fullname']));
        $register_phone = htmlspecialchars(trim($_POST['register_phone']));
        $register_email = htmlspecialchars(trim($_POST['register_email']));
        $register_adress = htmlspecialchars(trim($_POST['register_adress']));
        $register_postal = htmlspecialchars(trim($_POST['register_postal']));
        $register_city = strtoupper(htmlspecialchars(trim($_POST['register_city'])));
        $priv = "0";

        $password_encrypt = password_hash($register_password, PASSWORD_DEFAULT); // Encrypted Password

        // Query som skapar en ny användare i databasen
        $query = "INSERT INTO users VALUE(?,?,?,?,?,?,?,?,?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("ssssssisi", $register_username, $password_encrypt, 
                $register_fullname, $register_phone, $register_email, $register_adress, 
                $register_postal, $register_city, $priv);
            if ($stmt->execute()) {
                $feedback = "User "  . $register_fullname . " created successfully!";
            } else {
                $feedback = "Could not create user " . $register_username . ".";
            }
            $stmt->close();
            
        }
    } elseif (isset($_POST['register_submit']) && $_SESSION['privilege'] == 1) {
        $feedback = "Insufficient permissions.";
    }
?>

