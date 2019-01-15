<table class="table is-fullwidth">
    <thead>
    <tr>
        <?php
        if ($thead->num_rows > 0) {


            while ($row = mysqli_fetch_array($thead)) {

                $titel = ucfirst($row['Veldnaam']);

                echo "<th>" . $titel . "</th>";

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


            //datetime format veranderen van Y-m-d naar d-m-Y
            $var = $row['datum'];
            $date = date('d-m-Y', strtotime($var));


            // header tussen andere cursusids te plaatse

            if ($cursusid !== $row['CursusID']) {
                echo "<tr class='showModal' bgcolor='#003d6b' style='color: #FFFFFF;'>";
                echo "<th colspan='100%'>" . $row['Opleidingnaam'] . "</th>";
                echo "</tr>";
            }

            // staan hier zodat de functie hierboven niet al de volgende var krijg en dus niet meer functioneert
            $cursusid = $row['CursusID'];
            $coid = $row['CursusOnderdeelID'];

            //indicatie include om aan te geven dat er een opmerking aanwezig is
            include 'index.indicatie.php';



            // informatie die in de tabel komt
            echo "<tr class='view_data' onclick='modalFucntion(\"" . $cursusid . "\",\"" . $coid . "\")' >";
            echo "<td width='12.5%' id='1" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['onderdeelnaam'] . "</td>";
            echo "<td width='12.5%' id='2" . $coid . "' bgcolor='" . $bgcolor . "' style=''> " . $row['Opleidingnaam'] . " </td>";
            echo "<td width='12.5%' id='3" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['Bedrijf'] . "</td>";
            echo "<td width='12.5%' id='4" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['Docent'] . "</td>";
            echo "<td width='12.5%' id='5" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $date . "</td>";
            echo "<td width='12.5%' id='6" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['Aantal'] . "</td>";
            echo "<td width='12.5%' id='7" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['Locatie'] . "</td>";
            echo "<td width='12.5%' id='8" . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row['Plaats'] . "</td>";
            echo "</tr>";


        }

    }

    ?>
    </tbody>
</table>