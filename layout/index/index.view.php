<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 2-10-2018
 * Time: 9:33
 */

//    de include hier onder word de sql code in gezet om voor de table te gebruiken
include_once 'index.sql.php';

?>

<div class="hero-body" xmlns="http://www.w3.org/1999/html">
    <div class="container">


        <h1 class="title">Overzich van Interne transport.</h1>
        <?php

        include_once 'index.ajax.php';

        // de include word gebruikt om de data te showen die worden opgehaald aan de hand van index.sql.php en in table gezet
        include_once 'index.table.php';

        ?>

    </div>
</div>
