<?php

    function check_in_range($start_date, $end_date, $start_date_from_user, $end_date_from_user)
    {
    // Convert to timestamp
    $start_ts = $start_date;
    $end_ts = $end_date;
    $start_user_ts = $start_date_from_user;
    $end_user_ts = $end_date_from_user;

    debug_to_console("Start: " . $start_date . " End: " . "$end_date" . " User: " . $date_from_user);

    // Check that user date is between start & end
    if (($start_user_ts >= $start_ts) && ($start_user_ts <= $end_ts)) return 1;
    elseif (($end_user_ts >= $start_ts) && ($end_user_ts <= $end_ts)) return 1;
    elseif (($start_user_ts <= $start_ts) && ($end_user_ts >= $end_ts)) return 1;
    else return 0;
    }

?>