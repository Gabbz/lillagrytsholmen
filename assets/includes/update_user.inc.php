<?php

if (!empty($_SESSION['logged_in'])) {
    $username = $_SESSION['username'];
} else {
    $username = "";
}
$password = "";
$feedback = "To update your information please fill in the boxes.";

if (isset($_POST['update_submit'])) {
    $username = htmlspecialchars(trim($_POST['username_update']));
    $password = htmlspecialchars(trim($_POST['password_update']));

    // Här skulle jag vilja använda password_hash() eller hash_equals() tillsammans med crypt()
    $password_encrypt = crypt($password, '$5$rounds=5000$[B3n!7WuyPq;$Y_"$'); // Encrypted Password

    if (!empty($username) && empty($password)) {
        $query = "UPDATE users SET username = (?) WHERE userID = (?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('si', $username, $_SESSION['userID']);
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                $feedback = "Username updated to " . $username . "!";
            } else {
                $feedback = "Something went wrong when updating username";
            }
            $stmt->close();
        }
    } elseif (empty($username) && !empty($password)) {
        $query = "UPDATE users SET password = (?) WHERE userID = (?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('si', $password_encrypt, $_SESSION['userID']);
            if ($stmt->execute()) {
                $feedback = "Password updated successfully!";
            } else {
                $feedback = "Something went wrong when updating the password";
            }
            $stmt->close();
        }
    } elseif (!empty($username) && !empty($password)) {
        $query = "UPDATE users SET password = (?), username = (?) WHERE userID = (?)";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('ssi', $password_encrypt, $username, $_SESSION['userID']);
            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                $feedback = "Password and Username updated successfully! New username: " . $username . ".";
            } else {
                $feedback = "Something went wrong when updating information";
            }
            $stmt->close();
        }

    } else {
        $feedback = "At least one field must be filled in";
    }
}

if (isset($_POST['delete_user'])) {

    // Query som tar bort alla kopplingar mellan en användare och dess hittade bilar
    $query = "DELETE FROM userspotscar WHERE userID = (?)";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $_SESSION['userID']);
        if ($stmt->execute()) {
        } else {$feedback = "An error occurred when deleting user" .$_SESSION['username']. " from Combine table.";}
        $stmt->close();
    }

    // Query som tar bort användaren ur tabellen users samt rensar sessionen
    $query = "DELETE FROM users WHERE userID = (?)";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("i", $_SESSION['userID']);
        if ($stmt->execute()) {
            $feedback = "User " .$_SESSION['username']. " deleted for good, please register and log in again to use this service.";
            session_unset();
            session_destroy();
            // Popup med information till användaren
            echo "<script type='text/javascript'>alert('$feedback');</script>";
        } else {$feedback = "An error occurred when deleting user" .$_SESSION['username']. ".";}
        $stmt->close();
    }
}
?>