<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 16/01/2019
 * Time: 12:27
 */

if (isset($_POST['submit'])) {

    $cid = $_GET['CursusID'];
    $coid = $_GET['CursusonderdeelID'];
    $bid = $_GET['BID'];

    include_once '../../db/db.connect.php';

    $sql = '';

    while (($fruit_name = current($_POST)) !== FALSE) {

        $key = key($_POST);

        echo $key . '<br>';


        $input = mysqli_real_escape_string($conn, $_POST[$key]);


        if ($input != '' && $input != 'Submit') {
            $sql .= "INSERT INTO opmerking (veldid, cursusid, cursusonderdeelid, BedrijfID,usersid, opmerking) values('$key', '$cid', '$coid', '$bid', '1', '$input');";

        }

        next($_POST);
    }
    echo $sql .'<br>';
    if ($conn->multi_query($sql) === TRUE) {
        header("location: ../../?status=succes");
        exit();
    } else {
        header("location: ../../");
        exit();
    }


} else {
    header("location: ../../");
    exit();
}


