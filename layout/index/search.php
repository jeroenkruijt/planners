<?php
/**
 * Created b y PhpStorm.
 * User: jkruijt
 * Date: 30/01/2019
 * Time: 09:27
 */
if (isset($_POST['submit-zoek'])) {

    require_once "../../db/db.connect.php";

    session_start();

    $zoek = mysqli_escape_string($conn, $_POST['zoek']);

    $_SESSION['zoekterm'] = $zoek;

    $zoeksql = " AND (OP.Opleidingnaam LIKE '%$zoek%' OR O.onderdeelnaam LIKE '%$zoek%' or CODD.Docent LIKE '%$zoek%' OR Aantal LIKE '%$zoek%' OR B.accountname LIKE '%$zoek%' OR  BS.ship_city  LIKE '%$zoek%' OR ED.Lunch LIKE '%$zoek%'
 OR ED.Subsidie LIKE '%$zoek%' OR ED.Certificaten LIKE '%$zoek%' OR ED.Gefactureerd LIKE '%$zoek%' OR ED.Uitnodigingen LIKE '%$zoek%' OR ED.exameninstantie LIKE '%$zoek%' or ED.Overnachting like '%$zoek%' or L.Locatienaam like '%$zoek%' 
or B.accountname like '%$zoek%' or B.accountname like '%$zoek%' or L.Woonplaats like '%$zoek%' or BS.ship_city like '%$zoek%' or CODA.Assistent like '%$zoek%') ";

    $_SESSION['zoek'] = $zoeksql;

    header("location: ../../");
    exit();

} elseif (isset($_POST['submit-unset'])) {

    session_start();
    unset($_SESSION['zoek']);
    unset($_SESSION['zoekterm']);

    header("location: ../../");
    exit();

} else {


    header("location: ../../");
    exit();
}