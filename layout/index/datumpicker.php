<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/12/2018
 * Time: 10:39
 */

if (isset($_POST['submit'])) {

    require_once '../../db/db.connect.php';

    $jaar = mysqli_real_escape_string($conn, $_POST['jaar']);
    $maand = mysqli_real_escape_string($conn, $_POST['maand']);
    $afdeling = mysqli_escape_string($conn, $_POST['afdelingen']);

    $zoek = mysqli_escape_string($conn, $_POST['zoek']);

    echo $afdeling;

    session_start();


    if ($afdeling != 'Alle afdelingen') {
        $_SESSION['afdeling'] = $afdeling;
    } else {
        unset($_SESSION['afdeling']);
    }
    $_SESSION['year'] = $jaar;
    $_SESSION['month'] = $maand;

    header("location: ../../");
    exit();

} else {

    header("location: ../../");
    exit();
}
