<?php

    include('db_connect.inc.php');

    if (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0) {
        $book_dates = htmlspecialchars(trim($_POST['book_dates']));
        $from_date = date(substr($book_dates, 0, -19) . ":00");
        $to_date = date(substr($book_dates, 19) . ":00");
        $book_name = htmlspecialchars(trim($_POST['book_name']));
        $book_name_replace = str_replace(" ","_",$book_name);
        $book_message = htmlspecialchars(trim($_POST['book_message']));
        debug_to_console( "funkar");
        debug_to_console( "book_name: " . $book_name_replace . " from_date:" . $from_date . "to_date:" . $to_date. "book_message: " . $book_message);
       
        // Query som skapar en bokning
        //$query = "INSERT INTO booking VALUE(?,?,?,?)";
        debug_to_console( "funkar2");
        $stmt = $mysqli->prepare("INSERT INTO booking VALUES (?,?,?,?)");
        if ( false===$stmt ) {
            // and since all the following operations need a valid/ready statement object
            // it doesn't make sense to go on
            // you might want to use a more sophisticated mechanism than die()
            // but's it's only an example
            die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        }
        if ($stmt = $mysqli->prepare($query)) {
            debug_to_console( "funkar3");
            $stmt->bind_param("siis", $book_name_replace, $from_date, $to_date, $book_message);
            if ($stmt->execute()) {
                debug_to_console( "funkar4");
                $feedback = "Bokningen för "  . $book_name . " lyckades!";
            } else {
                $feedback = "Något med bokningen gick fel. Var vänlig kontakta systemadministratör.";
            }
            $stmt->close();
            
        }
    
    } elseif (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0 && $_SESSION['username']) {
        $feedback = "Du måste logga in för att göra en bokning.";
    }

?>