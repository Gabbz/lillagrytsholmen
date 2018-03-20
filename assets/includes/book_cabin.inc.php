<?php

    include('db_connect.inc.php');

    if (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0) {
        $book_dates = htmlspecialchars(trim($_POST['book_dates']));
        $from_date = date(substr($book_dates, 0, -19) . ":00");
        $to_date = date(substr($book_dates, 19) . ":00");
        $book_name = htmlspecialchars(trim($_POST['book_name']));
        $book_name_replace = str_replace(" ","_",$book_name);
        $book_message = htmlspecialchars(trim($_POST['book_message']));
        //debug_to_console( "funkar");
        //debug_to_console( "book_name: " . $book_name_replace . " from_date:" . $from_date . "to_date:" . $to_date. "book_message: " . $book_message);
       
        // Query som skapar en bokning
        //$query = "INSERT INTO booking VALUE(?,?,?,?)";
        /*$stmt = $mysqli->prepare("INSERT INTO booking VALUES (?,?,?,?,?,?)");
        if ( false===$stmt ) {
            // and since all the following operations need a valid/ready statement object
            // it doesn't make sense to go on
            // you might want to use a more sophisticated mechanism than die()
            // but's it's only an example
            die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        }
        if ($stmt) {
            debug_to_console( "funkar3");
            $stmt->bind_param("ssiiis", NULL, $book_name_replace, $from_date, $to_date, $book_message);
            if ($stmt->execute()) {
                debug_to_console( "funkar4");
                $feedback = "Bokningen för "  . $book_name . " lyckades!";
            } else {
                $feedback = "Något med bokningen gick fel. Var vänlig kontakta systemadministratör.";
            }
            $stmt->close();
            
        }*/

        $stmt = $mysqli->prepare("INSERT INTO booking VALUES (?,?,CURRENT_TIMESTAMP,?,?,?)");
        // prepare() can fail because of syntax errors, missing privileges, ....
        if ( false===$stmt ) {
        // and since all the following operations need a valid/ready statement object
        // it doesn't make sense to go on
        // you might want to use a more sophisticated mechanism than die()
        // but's it's only an example
        die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        }
        $rc = $stmt->bind_param('ssiiis', NULL, $book_name_replace, CURRENT_TIMESTAMP, $from_date, $to_date, $book_message);
        // bind_param() can fail because the number of parameter doesn't match the placeholders in the statement
        // or there's a type conflict(?), or ....
        if ( false===$rc ) {
        // again execute() is useless if you can't bind the parameters. Bail out somehow.
        die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }
        $rc = $stmt->execute();
        // execute() can fail for various reasons. And may it be as stupid as someone tripping over the network cable
        // 2006 "server gone away" is always an option
        if ( false===$rc ) {
        die('execute() failed: ' . htmlspecialchars($stmt->error));
        }

        $stmt->close();
    
    } elseif (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0 && $_SESSION['username']) {
        $feedback = "Du måste logga in för att göra en bokning.";
    }

?>