<!DOCTYPE HTML>

<?php
    include('db_connect.inc.php');

    // VARIABLE INITIATION
    $username ="reggiepalmer";
    $password ="hejsan123";
    $priv ="1";
    $feedback ="Login, register or choose another tab!";

    $password_encrypt = password_hash($password, PASSWORD_DEFAULT); // Encrypted Password

    // Query som skapar en ny användare i databasen
    $query = "INSERT INTO admin VALUE(?,?,?)";
    if ($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("ssi", $username, $password_encrypt, $priv);
        if ($stmt->execute()) {
            $feedback = "User "  .$username. " created successfully! You can now log in.";
        } else {
            $feedback = "Could not create user " .$username. ".";
        }
        $stmt->close();
        
    }
?>


<html>
    <body>
        <p>ALIVE</p>
        <?php print $feedback; ?>
    </body>
</html>
