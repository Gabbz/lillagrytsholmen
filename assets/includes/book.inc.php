<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $resultArr = [];

    $booking = new stdClass(); 

    for ($i = 0;$row = mysqli_fetch_array($result);$i++) {
        $booking->renter =  $row['renter'];
        $booking->from_date_year =  substr($row['from_date'], 0, 3);
        $booking->from_date_month =  substr($row['from_date'], 4, 6);
        $booking->from_date_day =  substr($row['from_date'], 7, 9);
        $booking->to_date_year = substr($row['to_date'], 0, 10);
        $booking->to_date_month = substr($row['to_date'], 0, 10);
        $booking->to_date_day = substr($row['to_date'], 0, 10);

        $resultArr[$i] = $booking;
    }

    

    echo json_encode($resultArr);
?>
