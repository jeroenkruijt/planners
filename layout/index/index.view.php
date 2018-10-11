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
                <th>Onderdeelnaam</th>
                <th>Opleidingnaam</th>
                <th>Bedrijf</th>
                <th>Docent</th>
                <th>Datum</th>
                <th>Aantal</th>
                <th>Locatie</th>
                <th>Plaats</th>
            </tr>
            </thead>
            <tbody>

            <?php
                if ($result->num_rows > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        if ($row['DocentID']>0) {
                            $link = "details.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&docentid=" . $row['DocentID'];
                        }else{
                            $link = "details.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'];

                        }
                        echo "<tr onclick='window.location.href=\"". $link . "\"'>";
                        echo "<td>" . $row['onderdeelnaam'] . "</td>";
                        echo "<td>" . $row['Opleidingnaam'] . "</td>";
                        echo "<td>" . $row['Bedrijf'] . "</td>";
                        echo "<td>" . $row['Docent'] . "</td>";
                        echo "<td>" . $row['datum'] . "</td>";
                        echo "<td>" . $row['Aantal'] . "</td>";
                        echo "<td>" . $row['Locatie'] . "</td>";
                        echo "<td>" . $row['Plaats'] . "</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
