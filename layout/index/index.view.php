<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 2-10-2018
     * Time: 9:33
     */

    //    deze word gebruikt in index.php om de data te showen in index

    include_once 'index.sql.php';

    require_once 'index.javascript.php';

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
                        echo "<th>view</th>";
                    }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        if ($row['DocentID'] > 0) {
                            $link = "add.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&docentid=" . $row['DocentID'] . "&optie=0";
                        } else {
                            $link = "add.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&optie=1";
                        }

                        if ($row['DocentID'] > 0) {
                            $lopmerking = "opmerking.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&docentid=" . $row['DocentID'] . "&optie=0";
                        } else {
                            $lopmerking = "opmerking.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&optie=1";
                        }

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
                        echo "<td><a class='button is-link' href='$lopmerking'>bekijk opmerkingen</a></td>";
                        echo "<td><a class='button is-warning' href='$link'>plaats opmerking</a></td>";
                        echo "</tr>";


                        /*                        <input type=\"button\" name=\"view\" value=\"view\" id=\"<?php echo $row[\"id\"]; ?>\" class=\"btn btn-info btn-xs view_data\" />*/


                        //de include voor het toevoegen van het scherm van de popup


                    }

                    echo "</tbody>";
                    echo "</table>";

                }

            ?>


    </div>
</div>
