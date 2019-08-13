




<?php
echo '<table class="table-sm table-hover table-bordered table-striped is-fullwidth">';
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

if (isset($_SESSION['afdeling'])) {

    $where = 'AND AfdelingID = ' . $_SESSION['afdeling'];

} else {

    $where = '';

}

$acount = count($veldid);

echo '</tr>';
echo '</thead>';


$sql = "SELECT DISTINCT CO.CursusID, DATE(CO.DatumBegin) AS Datum
		FROM cursusonderdelen CO
        LEFT JOIN psentity P ON CO.CursusID = P.psid
        INNER JOIN opleidingonderdelen OP ON CO.OnderdeelID = OP.OnderdeelID
        INNER JOIN opleidingen O on OP.OpleidingID = O.OpleidingID
		WHERE P.deleted = 0 AND YEAR(CO.DatumBegin) = $year AND MONTH(CO.DatumBegin) = $month $where
		ORDER BY CO.DatumBegin";

$CursusID = 28115;


$result = mysqli_query($conn, $sql);
$datas = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }
    $CID = array_column($datas, 'CursusID');


    $id = '';

    $id = "'" . implode("', '", $CID) . "'";

    $ids = join(',', array_fill(0, count($id), $id));

    if (isset($_SESSION['zoek'])) {

        $zoek = $_SESSION['zoek'];

    } else {

        $zoek = '';

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
			LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID and CB.BedrijfID = ED.BedrijfID 
			LEFT JOIN psentity P ON C.CursusID = P.psid
            WHERE P.deleted = 0
            AND C.CursusID IN ($ids)
            order by C.CursusID
            ";

    $result2 = mysqli_query($conn, $sql2);

    $cursusid = '';

    while ($datas2 = mysqli_fetch_assoc($result2)) {

        if ($cursusid !== $datas2['CursusID']) {
            echo "<tr>
            <td id='opleiding' colspan='100%'>" . $datas2['Opleidingnaam'] . "</td>
            </tr>";
        }

        $cursusid = $datas2['CursusID'];

        $coid = $datas2['CursusOnderdeelID'];
        $bedrijfid = $datas2['BedrijfID'];


        if ($datas2['Certificatendatum'] = '1900-01-01') {
            $datas2['Certificatendatum'] = '';
        }

        if ($datas2['Certificatendatum'] != '') {
            $newDate = date("d-m-Y", strtotime($datas2['Certificatendatum']));

            $datas2['Certificaten'] = $datas2['Certificaten'] . '<br>' . $newDate;
        }


        if ($datas2['bedrag'] != '') {
            $datas2['Gefactureerd'] = $datas2['Gefactureerd'] . '<br>€' . $datas2['bedrag'];
        }

        if($datas2['Lesmateriaal'] != '' && $datas2['Praktijkmateriaal']){
            $datas2['materiaal'] = 'Lesmateriaal: '. $datas2['Lesmateriaal'].'<br>Praktijkmatriaal: '. $datas2['Praktijkmateriaal'];
        }



        include 'index.indicatie.php';

        $datas2['cursusdatum'] = date('d-m-Y', strtotime($datas2['datum'])) . '</br>' . date('H:i', strtotime($datas2['datum'])) . ' - ' . date('H:i', strtotime($datas2['DatumEind']));

        echo "<tr class='view_data' onclick='modalFucntion(" . $cursusid . "," . $coid . ", " . $bedrijfid . ")'  >";
        for ($count = 0; $count < $acount; $count++) {

            $info = $veldnaam[$count];

            echo "<td class='$veldid[$count]$cursusid' id='" . $veldid[$count] . $bedrijfid . $coid . "'  style='text-align:center;'>" . $datas2[$info] . "</td>";

        }
        echo "</tr>";
    }
  
}
echo '</table>';


?>
