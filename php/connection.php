<?php
    require "constants.php";
    // hostname, username, password, db name
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*
    if (!$connection) {
        echo "no connection";
    }
    else {
        echo "connected!";
    }
*/
?>
