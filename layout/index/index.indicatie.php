<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/12/2018
 * Time: 11:18
 */

//indicator plaatsen over een tabel die
$comment = 'select * from opmerking where CursusID = ' . $cursusid . ' AND CursusonderdeelID = ' . $coid . ' AND BedrijfID = ' . $bedrijfid;

$comm = $conn->query($comment);

while ($change = mysqli_fetch_array($comm)) {

    $change = $change['VeldID'] . $bedrijfid . $coid;

    ?>


    <script>
        $(document).ready(function () {

            $("#<?php echo $change?>").attr("style", "text-align: center;font-weight: bold;font-style: italic; color:#2e6da4; border: 2px solid #207A21; ");

        });
    </script>
    <!--    #003d6b-->

    <?php

}


$massa = 'SELECT Opmerking, VeldID  FROM opmerking WHERE CursusID = ' . $cursusid . ' AND 	MassaOpmerking = 1';


$mas = $conn->query($massa);

while ($indicatie = mysqli_fetch_array($mas)) {


    ?>


    <script>
        $(document).ready(function () {

            $(".<?php echo $indicatie['VeldID'] . $cursusid?>").attr("style", "text-align: center;font-weight: bold;font-style: italic; color:#2e6da4; border: 2px solid #207A21; ");

        });
    </script>


    <?php

}

//bezig indicatie maken voor de index pagina
$bgcolor = '#003d6b';
$rowSQL = mysqli_query($conn, "SELECT MAX( VeldID ) AS max FROM velden;");
$number = mysqli_fetch_array($rowSQL);
$largestNumber = $number['max'];
for ($i = 0; $i <= $largestNumber; $i++) {
        if ($bedrijfid == '') {
            $bezig = 'select * from actief where VeldID = ' . $i . ' and Cursusid = ' . $cursusid . '  and Cursusonderdeelid = ' . $coid;
        } else {
            $bezig = 'select * from actief where VeldID = ' . $i . ' and Cursusid = ' . $cursusid . '  and Cursusonderdeelid = ' . $coid . ' and BedrijfID = ' . $bedrijfid;
        }
//    echo $bezig . '<BR>';
    $klaar = $conn->query($bezig);
    if (mysqli_num_rows($klaar) > 0) {
        $done = mysqli_fetch_array($klaar);
        $id = $done['VeldID'] . $bedrijfid . $coid;
//        echo 'hello';
        ?>
        <script>
            $(document).ready(function () {
                $("#<?php echo $id?>").attr("bgcolor", "#ffffff");
            });
        </script>
        <?php
    }
}
?>