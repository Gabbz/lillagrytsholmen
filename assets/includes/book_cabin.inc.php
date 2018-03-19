<?php
    if (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0) {
        $book_dates = htmlspecialchars(trim($_POST['book_dates']));
        $from_date = substr($book_dates, 0, -19);
        $to_date = substr($book_dates, 19);
        $book_name = htmlspecialchars(trim($_POST['book_name']));
        $book_name_replace = str_replace(" ","_",$book_name);
        $book_message = htmlspecialchars(trim($_POST['book_message']));
        debug_to_console( "funkar");
        debug_to_console( "book_name: " . $book_name_replace . " book_message: " . $book_message . " from_date: " . $from_date . " to_date: " . $to_date);
       
        // Query som skapar en bokning
        $query = "INSERT INTO booking VALUE(?,?,?,?)";
        debug_to_console( "funkar2");
        if ($stmt = $mysqli->prepare($query)) {
            debug_to_console( "funkar3");
            $stmt->bind_param("ssss", $book_name_replace, $from_date, $to_date, $book_message);
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