<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/12/2018
 * Time: 11:18
 */

//indicator plaatsen over een tabel die
$comment = 'select * from opmerking where CursusID = ' . $cursusid . ' AND CursusonderdeelID = ' . $coid;

$comm = $conn->query($comment);

while ($change = mysqli_fetch_array($comm)) {

    $change = $change['VeldID'] . $change['CursusonderdeelID']

    ?>


    <script>
        $(document).ready(function () {

            $("#<?php echo $change?>").attr("style", "font-weight: bold;font-style: italic; color:#2e6da4");

        });
    </script>


    <?php


}


//bezig indicatie maken voor de index pagina

$bgcolor = '#E7E7E7';

for ($i = 1; $i < 9; $i++) {
//echo $i;
    $bezig = 'select * from actief where VeldID = ' . $i . ' and Cursusid = ' . $cursusid . '  and Cursusonderdeelid = ' . $coid;

    $klaar = $conn->query($bezig);

    if (mysqli_num_rows($klaar) > 0) {

        $done = mysqli_fetch_array($klaar);
          $id = $done['VeldID'].$done['Cursusonderdeelid'];


        ?>
        <script>
            $(document).ready(function () {

                $("#<?php echo $id?>").attr("bgcolor", "#ffffff");

            });
        </script>
        <?php

    }
}








// style style='font-weight: bold;