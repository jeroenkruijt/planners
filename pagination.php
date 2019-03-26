<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 26/03/2019
 * Time: 14:48
 */

//pagination.php
$connect = mysqli_connect("192.168.20.5", "Planning", "twebopleidingen7", "planningssysteem");
$record_per_page = 25;
$page = '';
$output = '';

$sql = "SELECT * FROM velden WHERE Zichtbaar = 1 order by volgorde asc ";

$thead = $connect->query($sql);

$row_cnt = $thead->num_rows;


if (isset($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $record_per_page;
$query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
CASE WHEN Aantal > 0 THEN Aantal ELSE '0' END AS Aantal, CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Cursuslocatie, 
CASE WHEN CB.BedrijfID > 0 THEN B1.accountname ELSE 'Geen bedrijf' END AS Bedrijf, CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Lesplaats, 
ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen, ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag, ED.Overnachting 
FROM cursussen C 
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID 
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID 
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID 
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID LEFT JOIN vtigercrm600.vtiger_account B ON COL.BedrijfID = B.accountid 
LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid 
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID 
LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID 
LEFT JOIN (SELECT CC.BedrijfID, COC.CursusOnderdeelID, COUNT(COC.CursistID) AS Aantal FROM cursusonderdeelcursisten COC 
LEFT JOIN cursuscursisten CC ON COC.CursusID = CC.CursusID AND COC.CursistID = CC.CursistID 
GROUP BY COC.CursusOnderdeelID, CC.BedrijfID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID AND CB.BedrijfID = COC.BedrijfID 
LEFT JOIN vtigercrm600.vtiger_account B1 ON CB.BedrijfID = B1.accountid 
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Docent 
FROM cursusonderdeeldocenten COD 
LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Docent = 1 GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID 
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Assistent 
FROM cursusonderdeeldocenten COD LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Assistent = 1 GROUP BY COD.CursusOnderdeelID) CODA ON CO.CursusOnderdeelID = CODA.CursusOnderdeelID 
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID and CB.BedrijfID = ED.BedrijfID 
LEFT JOIN psentity P ON C.CursusID = P.psid
WHERE P.deleted = 0 AND year(CO.DatumBegin) = 2019 AND MONTH(CO.DatumBegin) = 1 order by date (datum)asc, CO.CursusOnderdeelID
LIMIT $start_from, $record_per_page";

// echo $query;

$result = $connect->query($query);


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

while ($row = mysqli_fetch_array($result)) {
    $output .= '  
           <tr>  
                <td>' . $row["Opleidingnaam"] . '</td>  
                <td>' . $row["onderdeelnaam"] . '</td>  
           </tr>  
      ';
}
$output .= '</table><br /><div align="center">';
$page_query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
CASE WHEN Aantal > 0 THEN Aantal ELSE '0' END AS Aantal, CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Cursuslocatie, 
CASE WHEN CB.BedrijfID > 0 THEN B1.accountname ELSE 'Geen bedrijf' END AS Bedrijf, CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Lesplaats, 
ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen, ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag, ED.Overnachting 
FROM cursussen C 
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID 
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID 
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID 
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID LEFT JOIN vtigercrm600.vtiger_account B ON COL.BedrijfID = B.accountid 
LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid 
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID 
LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID 
LEFT JOIN (SELECT CC.BedrijfID, COC.CursusOnderdeelID, COUNT(COC.CursistID) AS Aantal FROM cursusonderdeelcursisten COC 
LEFT JOIN cursuscursisten CC ON COC.CursusID = CC.CursusID AND COC.CursistID = CC.CursistID 
GROUP BY COC.CursusOnderdeelID, CC.BedrijfID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID AND CB.BedrijfID = COC.BedrijfID 
LEFT JOIN vtigercrm600.vtiger_account B1 ON CB.BedrijfID = B1.accountid 
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Docent 
FROM cursusonderdeeldocenten COD 
LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Docent = 1 GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID 
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Assistent 
FROM cursusonderdeeldocenten COD LEFT JOIN docenten D ON COD.DocentID = D.DocentID WHERE COD.Assistent = 1 GROUP BY COD.CursusOnderdeelID) CODA ON CO.CursusOnderdeelID = CODA.CursusOnderdeelID 
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID and CB.BedrijfID = ED.BedrijfID 
LEFT JOIN psentity P ON C.CursusID = P.psid
WHERE P.deleted = 0 AND year(CO.DatumBegin) = 2019 AND MONTH(CO.DatumBegin) = 1 order by date (datum)asc, CO.CursusOnderdeelID";
$page_result = mysqli_query($connect, $page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records / $record_per_page);
for ($i = 1; $i <= $total_pages; $i++) {
    $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='" . $i . "'>" . $i . "</span>";
}
$output .= '</div><br /><br />';
echo $output;
?>