<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 21/03/2019
 * Time: 09:00
 */

include_once '../../db/db.connect.php';


$opid = mysqli_real_escape_string($conn, $_POST['opmerkingid']);
$vid = mysqli_real_escape_string($conn, $_POST['VeldID']);
$coid = mysqli_real_escape_string($conn, $_POST['CursusonderdeelID']);
$cid = mysqli_real_escape_string($conn, $_POST['CursusID']);
$bid = mysqli_real_escape_string($conn, $_POST['BedrijfID']);


if ($bid != '') {
    $delete = 'DELETE FROM opmerking where Cursusonderdeelid = ' . $coid . ' and Cursusid= ' . $cid . ' and VeldID = ' . $vid . ' and OpmerkingID = ' . $opid . ' and BedrijfID = ' . $bid;
} else {
    $delete = 'DELETE FROM opmerking where Cursusonderdeelid = ' . $coid . ' and Cursusid= ' . $cid . ' and VeldID = ' . $vid . ' and OpmerkingID = ' . $opid;
}


$conn->query($delete);
