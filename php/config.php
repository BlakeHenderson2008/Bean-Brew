<?php
    define(DB_SERVER, 'localhost'),
    define(DB_NAME, 'bean_and_brew'),
    define(DB_USERNAME, 'root'),
    define(DB_PASSWORD, '')

    $link = mysqli_connect(DB_SERVER, DB_NAME, DB_USERNAME, DB_PASSWORD);
    if ($link === false) {
        die("Error: Could not connect." . mysqli_connect_error())
    };
?>