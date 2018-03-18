<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $resultArr = array();


    $booking = new stdClass(); 
    while($row = mysqli_fetch_array($result)) {
        $resultArr[] = $row;
    }

    echo json_encode($resultArr);





    if (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0 || 1) {
        $book_dates = htmlspecialchars(trim($_POST['book_dates']));
        $book_name = htmlspecialchars(trim($_POST['book_name']));
        $book_message = htmlspecialchars(trim($_POST['book_message']));
       
        // Query som skapar en bokning
        if (is_numeric($register_postal)) {
            $query = "INSERT INTO booking VALUE(?,?,?)";
            if ($stmt = $mysqli->prepare($query)) {
                $stmt->bind_param("sss", $book_dates, $book_name, $book_message);
                if ($stmt->execute()) {
                    $feedback = "Bokningen för "  . $book_name . " lyckades!";
                } else {
                    $feedback = "Något med bokningen gick fel. Var vänlig kontakta systemadministratör.";
                }
                $stmt->close();
                
            }
        }
    } elseif (isset($_POST['book_submit']) && $_SESSION['privilege'] == 0 && $_SESSION['username']) {
        $feedback = "Du måste logga in för att göra en bokning.";
    }

?>









?>
