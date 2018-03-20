<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    debug_to_console("kommer hit 1");
    $query = "SELECT * FROM booking";
    debug_to_console("kommer hit 2");
    $result = mysqli_query($mysqli,$query);
    debug_to_console("kommer hit 3");

    $resultArr = array();


    $booking = new stdClass(); 
    while($row = mysqli_fetch_array($result)) {
        debug_to_console("kommer hit " . $row);
        $resultArr[] = $row;
    }

    echo json_encode($resultArr);

?>