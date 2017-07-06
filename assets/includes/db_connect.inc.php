<?php

    //Anslutning till databasen
    $db_host     = 'localhost:3306';
    $db_user     = 'reggiepalmer'; //db-user
    $db_password = 'Xrke$S*j9EJw#M4QKp4$RU*K'; //db-password
    $database = 'lillagrytsholmen.se'; //db

    $mysqli = new mysqli("$db_host", "$db_user", "$db_password", "$database");

    /*avkommentera fÃ¶r felsÃ¶kning 
    if ($mysqli->connect_errno) {
        print'Database connection failed: ' . $mysqli->connect_error;  
    } else {
        print 'Database connection is OK: ' . $mysqli->host_info;
    } 
*/
    
?>