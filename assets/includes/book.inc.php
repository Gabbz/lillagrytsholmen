<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    $jsonArr = [];

    while($row = mysqli_fetch_array($result)) {
        $jsonArr[0] =  $row['renter'];
        $jsonArr[1] =  $row['to_date'];
    }

    echo json_encode($jsonArr);
?>
