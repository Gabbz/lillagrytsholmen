<?php 

    include("db_connect.inc.php");

    mysqli_select_db($mysqli, "lillagrytsholmen.se");
    $query = "SELECT * FROM booking";
    $result = mysqli_query($mysqli,$query);

    while($row = mysqli_fetch_array($result)) {
        echo $row['renter'];
        echo $row['to_date'];
    }
?>
