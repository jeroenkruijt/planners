<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 2-10-2018
 * Time: 9:33
 */

//    deze word gebruikt in index.php om de data te showen in index

include_once 'index.sql.php';

//echo het verwerken om het showbaar te maken, en de html code klaar maken die


?>
<div class="hero-body" xmlns="http://www.w3.org/1999/html">
    <div class="container has-text-centered">

        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
            <tr>
                <?php
                if ($thead->num_rows > 0) {

                    while ($row = mysqli_fetch_array($thead)) {

                        echo "<th>" . $row['Veldnaam'] . "</th>";

                    }
                    echo "<th>opmerking plaatsen</th>";
                    echo "<th>bekijken</th>";
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result->num_rows > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    $cursusid = $row['CursusID'];
                    $opleidingid = $row['OpleidingID'];
                    $cursusonderdeelid = $row['CursusOnderdeelID'];
                    $docentid = $row['DocentID'];


                    if ($row['DocentID'] > 0) {
                        $link = "add.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $cursusonderdeelid . "&docentid=" . $docentid . "&optie=0";
                    } else {
                        $link = "add.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $opleidingid . "&optie=1";
                    }

                    if ($row['DocentID'] > 0) {
                        $linkop = "opmerking.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $cursusonderdeelid . "&docentid=" . $docentid . "&optie=0";
                    } else {
                        $linkop = "opmerking.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $opleidingid . "&optie=1";
                    }

                    // if statment om de knoppen weg te halen

                    $sql = "SELECT * FROM opmerking WHERE CursusID = $cursusid AND CursusonderdeelID = $cursusonderdeelid AND DocentID = $docentid";
                    $res = $conn->query($sql);
//                    $butopmerking = mysqli_fetch_array($res);

                    if ($res == true) {

                        if ($butopmerking = mysqli_fetch_array($res)) {
                            $butshow = '<td><a class="button is-primary" href="' . $linkop . ' ">bekijk opmerking</td>';
                            print_r($butopmerking);
                        } else {
                            $butshow = '<td><a class="button is-danger" disabled>geen opmerking aanwezig</td>';
                        };


                    } else {
                        $butshow = '<td><a class="button is-danger" disabled>geen opmerking aanwezig</td>';
                    }


//                    print_r($butopmerking);
//                    echo '<br>';


//                        onclick='window.location.href=\"" . $link . "\"'

                    echo "<tr class='showModal'>";
                    echo "<td>" . $row['onderdeelnaam'] . "</td>";
                    echo "<td>" . $row['Opleidingnaam'] . "</td>";
                    echo "<td>" . $row['Bedrijf'] . "</td>";
                    echo "<td>" . $row['Docent'] . "</td>";
                    echo "<td>" . $row['datum'] . "</td>";
                    echo "<td>" . $row['Aantal'] . "</td>";
                    echo "<td>" . $row['Locatie'] . "</td>";
                    echo "<td>" . $row['Plaats'] . "</td>";

                    echo "<td><a class='button is-warning' href='$link'>plaats opmerking</a></td>";

                    echo $butshow;

                    echo "</tr>";


                }

                echo "</tbody>";
                echo "</table>";

            }

            ?>


    </div>
</div>
