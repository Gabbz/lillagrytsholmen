<?php

    include('db_connect.inc.php');

    if (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0) {
        
        $book_dates = htmlspecialchars(trim($_POST['book_dates']));
        $from_date = date(substr($book_dates, 0, -19) . ":00");
        $to_date = date(substr($book_dates, 19) . ":00");
        $book_name = htmlspecialchars(trim($_POST['book_name']));
        $book_name_replace = str_replace(" ","_",$book_name);
        $book_message = htmlspecialchars(trim($_POST['book_message']));
       
        mysqli_select_db($mysqli, "lillagrytsholmen.se");
        $query = "SELECT * FROM booking";
        $result = mysqli_query($mysqli,$query);

        $resultArr = array();

        $booking = new stdClass(); 
        while($row = mysqli_fetch_array($result)) {
            $resultArr[] = $row;
        }

        debug_to_console($resultArr[0]);

        // Query som skapar en bokning
        $query = "INSERT INTO booking VALUES (NULL,?,CURRENT_TIMESTAMP,?,?,?)";
        //$stmt = $mysqli->prepare("INSERT INTO booking VALUES (?,?,?,?,?,?)");


        if ($stmt = $mysqli->prepare($query)) {
            $stmt->bind_param('ssss', $book_name_replace, $from_date, $to_date, $book_message);
            if ($stmt->execute()) {
                $feedback = "Bokningen för "  . $book_name . " lyckades!";
            } else {
                $feedback = "Något med bokningen gick fel. Var vänlig kontakta systemadministratör.";
            }
            $stmt->close();
        }
        $stmt->close();
    
    } elseif (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0 && $_SESSION['username']) {
        $feedback = "Du måste logga in för att göra en bokning.";
    }

?>