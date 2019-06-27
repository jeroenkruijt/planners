<!--<table class="table is-fullwidth">-->
<!--    <thead>-->
<!--    <tr>-->
<!---->
<!--                --><?php
//
//                //        $amount = money_format('%(#1n', 20);
//                //        echo $amount;
//
//                if ($thead->num_rows > 0) {
//
//
//                    while ($row = mysqli_fetch_array($thead)) {
//
//                        $ogt = $row['Veldnaam'];
//                        $id = $row['VeldID'];
//
//                        $titel = ucfirst($ogt);
//
//                        echo "<th id='fixed'>" . $titel . "</th>";
//
//
//                        $veldnaam[] = $ogt;
//                        $veldid[] = $id;
//
//        //                print_r($veldnaam);
//
//                    }
//
//                }
//
//                ?>
<!---->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!---->
<!--            --><?php
//
//            // include word gebruikt om de data in de table te zetten en de tussen thead er tussen te doen op cursusid verandering
//            $cursusid = $row['CursusID'];
//
//            $acount = count($veldnaam);
//
//            if ($result->num_rows > 0) {
//
//                while ($row = mysqli_fetch_array($result)) {
//
//        //            print_r($row);
//
//                    //datetime format veranderen van Y-m-d naar d-m-Y en H:i weg halen bij de datetime en apart
//                    $row['cursusdatum'] = date('d-m-Y', strtotime($row['datum'])) . '</br>' . date('H:i', strtotime($row['datum'])) . ' - ' . date('H:i', strtotime($row['DatumEind']));
//
//                    if ($row['Certificatendatum'] != '') {
//
//                        $date = strtotime('01-01-1900');
//                        $datum = date('Y-m-d', $date);
//
//                        if ($row['Certificatendatum'] != $datum) {
//                            $date = strtotime($row['Certificatendatum']);
//                            $datum = date('d-m-Y', $date);
//                            $row['Certificaten'] = $row['Certificaten'] . '<br>' . $datum;
//                        }
//
//                    }
//
//                    if ($row['bedrag'] != '') {
//
//                        $row['Gefactureerd'] = $row['Gefactureerd'] . '<br>€' . $row['bedrag'];
//                    }
//
//
//                    // header tussen andere cursusids te plaatse
//                    if ($cursusid !== $row['CursusID']) {
//                        echo "<tr class='showModal'>";
//                        echo "<th colspan='100%'>" . $row['Opleidingnaam'] . "</th>";
//                        echo "</tr>";
//                    }
//
//                    // staan hier zodat de functie hierboven niet al de volgende var krijg en dus niet meer functioneert
//                    $cursusid = $row['CursusID'];
//                    $coid = $row['CursusOnderdeelID'];
//                    $bedrijfid = $row['BedrijfID'];
//
//                    //indicatie include om aan te geven dat er een opmerking aanwezig is
//                    include 'index.indicatie.php';
//
//                    // informatie die in de tabel komt
//                    echo "<tr class='view_data' onclick='modalFucntion(\"" . $cursusid . "\",\"" . $coid . "\", \"" . $bedrijfid . "\")' >";
//
//
//                    for ($count = 0; $count < $acount; $count++) {
//
//                        $info = $veldnaam[$count];
//
//                        echo "<td  id='" . $veldid[$count] . $bedrijfid . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row[$info] . "</td>";
//
//                    }
//
//                    echo "</tr>";
//
//                }
//
//            }
//
//            ?>
<!--            </tbody>-->
<!--        </table>-->

<?php
echo '<table class="table is-fullwidth">';
echo '<thead class="">';
echo '<tr>';
$sql = "SELECT * FROM velden WHERE Zichtbaar = 1 order by volgorde asc ";

$thead = $conn->query($sql);
while ($row = mysqli_fetch_array($thead)) {
    $ogt = $row['Veldnaam'];
    $id = $row['VeldID'];

    $titel = ucfirst($ogt);

    echo "<th id='fixed'>" . $titel . "</th>";

    $veldnaam[] = $ogt;
    $veldid[] = $id;
}

$acount = count($veldid);

echo '</tr>';
echo '</thead>';

$sql = "SELECT DISTINCT CO.CursusID, DATE(CO.DatumBegin) AS Datum
		FROM cursusonderdelen CO
        LEFT JOIN psentity P ON CO.CursusID = P.psid
		WHERE P.deleted = 0 AND YEAR(CO.DatumBegin) = $year AND MONTH(CO.DatumBegin) = $month
		ORDER BY CO.DatumBegin";

$CursusID = 28115;

$result = mysqli_query($conn, $sql);
$datas = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }

    foreach ($datas as $data) {

        if ($data['CursusID'] > 0) {

            $CursusID = $data['CursusID'];

        }

        $sql2 = "
			SELECT  C.CursusID, CB.BedrijfID, CO.CursusOnderdeelID, OP.Opleidingnaam, O.onderdeelnaam, CO.DatumBegin as datum, CO.DatumEind, CODD.Docent, CODA.Assistent,
			CASE WHEN CB.BedrijfID > 0 THEN B.accountname ELSE 'Geen bedrijf' END AS Bedrijf,
            CASE WHEN Aantal > 0 THEN Aantal ELSE '0' END AS Aantal, CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Cursuslocatie,
            CASE WHEN CB.BedrijfID > 0 THEN B.accountname ELSE 'Geen bedrijf' END AS Bedrijf, CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Lesplaats,
			ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen, ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag, ED.Overnachting
			FROM cursussen C
			LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID
			LEFT JOIN vtigercrm600.vtiger_account B ON CB.BedrijfID = B.accountid
			LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid
			LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID
			LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID
			LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID
			LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID
			LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID
			LEFT JOIN (SELECT CC.BedrijfID, COC.CursusOnderdeelID, COUNT(COC.CursistID) AS Aantal FROM cursusonderdeelcursisten COC
            LEFT JOIN cursuscursisten CC ON COC.CursusID = CC.CursusID AND COC.CursistID = CC.CursistID
            GROUP BY COC.CursusOnderdeelID, CC.BedrijfID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID AND CB.BedrijfID = COC.BedrijfID
			LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Docent
            FROM cursusonderdeeldocenten COD
            LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Docent = 1 GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID
            LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Assistent
            FROM cursusonderdeeldocenten COD LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Assistent = 1 GROUP BY COD.CursusOnderdeelID) CODA ON CO.CursusOnderdeelID = CODA.CursusOnderdeelID
			LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID
			LEFT JOIN psentity P ON C.CursusID = P.psid
			WHERE P.deleted = 0 AND C.CursusID = $CursusID
			ORDER BY date(CO.DatumBegin),  CO.CursusOnderdeelID ";

        $result2 = mysqli_query($conn, $sql2);

        $datas2 = array();
        while ($row = mysqli_fetch_assoc($result2)) {
            $datas2[] = $row;
            $opleiding = $row['Opleidingnaam'];
        }


        echo "<tr>
            <td id='opleiding' colspan='100%'>" . $opleiding . "</td>
            </tr>";




        foreach ($datas2 as $data2) {

            $cursusid = $data2['CursusID'];

            $coid = $data2['CursusOnderdeelID'];
            $bedrijfid = $data2['BedrijfID'];

            include 'index.indicatie.php';

            $data2['cursusdatum'] = date('d-m-Y', strtotime($data2['datum'])) . '</br>' . date('H:i', strtotime($data2['datum'])) . ' - ' . date('H:i', strtotime($data2['DatumEind']));

            echo "<tr class='view_data' onclick='modalFucntion(" . $cursusid . "," . $coid . ", " . $bedrijfid . ")' >";
            for ($count = 0; $count < $acount; $count++) {

                $info = $veldnaam[$count];


                echo "<td  id='" . $veldid[$count] . $bedrijfid . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $data2[$info] . "</td>";

            }
            echo "</tr>";
        }
    }
}
echo '</table>';



?>
