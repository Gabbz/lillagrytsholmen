<?php

    function check_in_range($start_date, $end_date, $date_from_user)
    {
    // Convert to timestamp
    $start_ts = $start_date;
    $end_ts = $end_date;
    $user_ts = $date_from_user;

    debug_to_console("Start: " . $start_date . " End: " . "$end_date" . " User: " . $date_from_user);

    // Check that user date is between start & end
    if (($user_ts >= $start_ts) || ($user_ts <= $end_ts)) return 1;
    else return 0;
    }

?>