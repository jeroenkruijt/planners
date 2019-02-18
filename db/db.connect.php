<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 1-10-2018
     * Time: 10:48
     */

// db NAS
$servername3 = "192.168.20.201:3307";
$username3 = "klantenportaal";
$password3 = "R54#sec:Cod";
$dbname3 = "planningssysteem";

// connect to NAS
$conn = new mysqli($servername3, $username3, $password3, $dbname3);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}