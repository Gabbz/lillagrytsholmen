<?php

    //Anslutning till databasen
    $db_host     = 'localhost';
    $db_user     = 'admin_cat'; //db-user
    $db_password = 'Xrke$S*j9EJw#M4QKp4$RU*K'; //db-password
    $database = 'lillagrytsholmen.se'; //db

    $mysqli = new mysqli("$db_host", "$db_user", "$db_password", "$database");

    /*avkommentera för felsökning
    if ($mysqli->connect_errno) {
        debug_to_console('Database connection failed: ' . $mysqli->connect_error);  
    } else {
        debug_to_console('Database connection is OK: ' . $mysqli->host_info);
    } */

    
?>