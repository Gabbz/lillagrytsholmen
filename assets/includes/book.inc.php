<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $resultArr = [];

    $booking = new stdClass(); 

    for ($i = 0;$row = mysqli_fetch_array($result);$i++) {
        $booking->renter =  $row['renter'];
        $booking->from_date =  $row['from_date'];
        $booking->to_date = $row['to_date'];

        $resultArr[$i] = $booking;
    }

    

    echo json_encode($resultArr);
?>
