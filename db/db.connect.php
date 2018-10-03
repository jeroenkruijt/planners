<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 1-10-2018
     * Time: 10:48
     */

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "planningssysteem";

    $conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }