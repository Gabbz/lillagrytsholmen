<?php 

    include("db_connect.inc.php");

    //mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $resultArr = array();


    $booking = new stdClass(); 
    while($row = mysqli_fetch_array($result)) {
        $resultArr[] = $row;
    }

    echo json_encode($resultArr);

?>