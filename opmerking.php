<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 30-10-2018
 * Time: 16:00
 */


if (isset($_GET['CursusID']) && isset($_GET['CursusonderdeelID']) && isset($_GET['optie'])) {


    require_once "db/db.connect.php";

    include_once "layout/addons/header.php";

    include_once "layout/opmerking/opmerking.sql.php";

    include_once "layout/opmerking/opmerking.view.php";

    include_once "layout/addons/footer.php";

} else {

    header("location: ./");
    exit();

}