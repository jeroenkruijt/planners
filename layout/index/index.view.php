<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 22/11/2018
 * Time: 12:20
 */

include_once 'index.datummenu.php';
?>


<style>
    .tableFixHead {
        overflow-y: auto;
        height: 800px
    }

    /* Just common table stuff. */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px 16px;
    }

    th {
        background: #003d6b;
        color: #FFFFFF;
    }
</style>

<body>

<div class="container-fluid">


    <div class="table-responsive" id="pagination_data">

        <?php


        include_once 'index.table.php';

        ?>

    </div>
</div>

<script>
    var $th = $('.tableFixHead').find('thead th');
    $('.tableFixHead').on('scroll', function() {
        $th.css('transform', 'translateY('+ this.scrollTop +'px)');
    });
</script>
