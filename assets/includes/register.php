<!DOCTYPE HTML>

<?php
    include('db_connect.inc.php');

    if (isset($_POST['register_submit']) && $_SESSION['privilege'] == 1) {

        $register_username = htmlspecialchars(trim($_POST['register_username']));
        $register_password = htmlspecialchars(trim($_POST['register_password']));
        $register_fullname = htmlspecialchars(trim($_POST['register_fullname']));
        $priv = "0";

        $password_encrypt = password_hash($register_password, PASSWORD_DEFAULT); // Encrypted Password

        // Query som skapar en ny användare i databasen
        $query = "INSERT INTO users VALUE(?,?,?,?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param("sssi", $register_username, $password_encrypt, $register_fullname, $priv);
            if ($stmt->execute()) {
                $feedback = "User "  . $register_fullname . " created successfully!";
            } else {
                $feedback = "Could not create user " . $register_username . ".";
            }
            $stmt->close();
            
        }
    }
?>

