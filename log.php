<?php

function write_log($message, $logfile = '')
{
    // Determine log file
    if ($logfile == '') {
        // checking if the constant for the log file is defined
        $logfile = 'cache/default.log';
    }

    // Get time of request
    if (($time = $_SERVER['REQUEST_TIME']) == '') {
        $time = time();
    }

    // Format the date and time
    $date = date("Y-m-d H:i:s", $time);

    // Append to the log file
    if ($fd = @fopen($logfile, "a")) {
        $result = fputs($fd, $date . "\t\t" . $message . PHP_EOL);
        fclose($fd);
    }
}
