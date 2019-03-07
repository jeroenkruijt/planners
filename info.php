<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 4-10-2018
 * Time: 15:26
 */


if (isset($_GET['CursusID']) && isset($_GET['CursusonderdeelID'])) {


    require_once "db/db.connect.php";

    include_once "layout/addons/header.php";

    include_once 'layout/info/add.sql.php';

    include_once "layout/info/add.index.php";

    include_once "layout/addons/footer.php";

} else {

    header("location: ./");
    exit();

}