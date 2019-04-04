<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 1-10-2018
     * Time: 10:48
     */

//$host = "localhost";
//$user = "root";
//$pass = "";
//$db = "planningssysteem";
//
//$conn = mysqli_connect($host, $user, $pass, $db);
//
//// Check connection
//if (mysqli_connect_errno()) {
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}

// db NAS
$servername3 = "192.168.20.5";
$username3 = "Planning";
$password3 = "twebopleidingen7";
$dbname3 = "planningssysteem";

// connect to NAS
$conn = new mysqli($servername3, $username3, $password3, $dbname3);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}