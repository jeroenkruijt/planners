<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 31-10-2018
     * Time: 9:12
     */

    if ($_POST['submit']) {


        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parameters = strstr($actual_link, '?');

        header("location: ../../add.php$parameters");
        session_destroy();
        exit();

    } else {

        header("location: ../../");
        session_destroy();
        exit();

    }