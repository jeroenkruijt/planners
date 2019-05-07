<table class="table is-fullwidth">
    <thead>
    <tr>

        <?php

        //        $amount = money_format('%(#1n', 20);
        //        echo $amount;

        if ($thead->num_rows > 0) {


            while ($row = mysqli_fetch_array($thead)) {

                $ogt = $row['Veldnaam'];
                $id = $row['VeldID'];

                $titel = ucfirst($ogt);

                echo "<th id='fixed'>" . $titel . "</th>";


                $veldnaam[] = $ogt;
                $veldid[] = $id;

//                print_r($veldnaam);

            }

        }

        ?>

    </tr>
    </thead>
    <tbody>

    <?php

    // include word gebruikt om de data in de table te zetten en de tussen thead er tussen te doen op cursusid verandering
    $cursusid = $row['CursusID'];

    $acount = count($veldnaam);

    if ($result->num_rows > 0) {

        while ($row = mysqli_fetch_array($result)) {

//            print_r($row);

            //datetime format veranderen van Y-m-d naar d-m-Y en H:i weg halen bij de datetime en apart
            $row['cursusdatum'] = date('d-m-Y', strtotime($row['datum'])) . '</br>' . date('H:i', strtotime($row['datum'])) . ' - ' . date('H:i', strtotime($row['DatumEind']));

            if ($row['Certificatendatum'] != '') {

                $date = strtotime('01-01-1900');
                $datum = date('Y-m-d', $date);

                if ($row['Certificatendatum'] != $datum) {
                    $date = strtotime($row['Certificatendatum']);
                    $datum = date('d-m-Y', $date);
                    $row['Certificaten'] = $row['Certificaten'] . '<br>' . $datum;
                }

            }

            if ($row['bedrag'] != '') {

                $row['Gefactureerd'] = $row['Gefactureerd'] . '<br>€' . $row['bedrag'];
            }


            // header tussen andere cursusids te plaatse
            if ($cursusid !== $row['CursusID']) {
                echo "<tr class='showModal'>";
                echo "<th colspan='100%'>" . $row['Opleidingnaam'] . "</th>";
                echo "</tr>";
            }

            // staan hier zodat de functie hierboven niet al de volgende var krijg en dus niet meer functioneert
            $cursusid = $row['CursusID'];
            $coid = $row['CursusOnderdeelID'];
            $bedrijfid = $row['BedrijfID'];

            //indicatie include om aan te geven dat er een opmerking aanwezig is
            include 'index.indicatie.php';

            // informatie die in de tabel komt
            echo "<tr class='view_data' onclick='modalFucntion(\"" . $cursusid . "\",\"" . $coid . "\", \"" . $bedrijfid . "\")' >";


            for ($count = 0; $count < $acount; $count++) {

                $info = $veldnaam[$count];

                echo "<td  id='" . $veldid[$count] . $bedrijfid . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row[$info] . "</td>";

            }

            echo "</tr>";

        }

    }

    ?>
    </tbody>
</table>

