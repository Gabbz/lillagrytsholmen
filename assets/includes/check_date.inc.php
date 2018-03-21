<?php

    function check_in_range($start_date, $end_date, $date_from_user)
    {
    // Convert to timestamp

    debug_to_console("Start: " . $start_date . " End: " . "$end_date" . " User: " . $date_from_user);

    // Check that user date is between start & end
    if (($date_from_user >= $start_date) && ($date_from_user <= $end_date)) return 1;
    else return 0;
    }

?>