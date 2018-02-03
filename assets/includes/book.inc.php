<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $resultArr = [];



    var $i =  0;
    $booking = new stdClass(); 
    while($row = mysqli_fetch_array($result)) {
        $booking->renter =  $row['renter'];
        $booking->from_date_year =  substr($row['from_date'], 0, 4);
        $booking->from_date_month =  substr($row['from_date'], 5, 2);
        $booking->from_date_day =  substr($row['from_date'], 8, 2);
        $booking->to_date_year = substr($row['to_date'], 0, 4);
        $booking->to_date_month = substr($row['to_date'], 5, 2);
        $booking->to_date_day = substr($row['to_date'], 8, 2);
        $resultArr[$i] = $booking;
        $i++;
    }

/*    
    $booking = new stdClass(); 

    for ($i = 0;$row = mysqli_fetch_array($result); $i++) {
        $booking->renter =  $row['renter'];
        $booking->from_date_year =  substr($row['from_date'], 0, 4);
        $booking->from_date_month =  substr($row['from_date'], 5, 2);
        $booking->from_date_day =  substr($row['from_date'], 8, 2);
        $booking->to_date_year = substr($row['to_date'], 0, 4);
        $booking->to_date_month = substr($row['to_date'], 5, 2);
        $booking->to_date_day = substr($row['to_date'], 8, 2);
        $resultArr[$i] = $booking;
    }
*/
    

    echo json_encode($resultArr);
?>
