<table class="table is-fullwidth">
    <thead>
    <tr>
        <?php
        if ($thead->num_rows > 0) {

            echo "<th>cid</th>";

            while ($row = mysqli_fetch_array($thead)) {

                echo "<th>" . $row['Veldnaam'] . "</th>";

            }

        }

        ?>

    </tr>
    </thead>
    <tbody>

    <?php

    // include word gebruikt om de data in de table te zetten en de tussen thead er tussen te doen op cursusid verandering
    $cursusid = $row['CursusID'];


    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {


            if ($cursusid !== $row['CursusID']) {
                echo "<tr class='showModal' bgcolor='aqua'>";
                echo "<th colspan='100%'>" . $row['Opleidingnaam'] . "</th>";
                echo "</tr>";
            }

            $cursusid = $row['CursusID'];
            $opleidingid = $row['OpleidingID'];
            $cursusonderdeelid = $row['CursusOnderdeelID'];
            $docentid = $row['DocentID'];


            // informatie die in de tabel komt
            echo "<tr class='showModal' onclick='testFucntion(\" " . $cursusid . "\", \" " . $cursusonderdeelid . " \", \" " . $docentid . " \")'>";
            echo "<td>" . $cursusid . "</td>";
            echo "<td>" . $row['onderdeelnaam'] . "</td>";
            echo "<td>" . $row['Opleidingnaam'] . "</td>";
            echo "<td>" . $row['Bedrijf'] . "</td>";
            echo "<td>" . $row['Docent'] . "</td>";
            echo "<td>" . $row['datum'] . "</td>";
            echo "<td>" . $row['Aantal'] . "</td>";
            echo "<td>" . $row['Locatie'] . "</td>";
            echo "<td>" . $row['Plaats'] . "</td>";

            //            echo "<td><a class='button is-warning' href='$link'>plaats opmerking</a></td>";
            //
            //            echo $butshow;

            echo "</tr>";


        }


    }


    ?>
    </tbody>
</table>