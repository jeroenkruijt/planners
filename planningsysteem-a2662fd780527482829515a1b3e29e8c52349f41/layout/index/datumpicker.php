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

    echo $jaar . $maand;

    session_start();

    $_SESSION['year'] = $jaar;
    $_SESSION['month'] = $maand;

    header("location: ../../");
    exit();

} else {

    header("location: ../../");
    exit();
}
