<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 2-10-2018
 * Time: 12:12
 */



//    thead content de namen die boven aan de colmunen staan
$sql = "SELECT * FROM velden WHERE Zichtbaar = 1 order by VeldID asc ";

$thead = $conn->query($sql);

$row_cnt = $thead->num_rows;

session_start();

if(!isset($_SESSION['month'])){

    $_SESSION['month'] = date('m');

}
if (!isset($_SESSION['year'])){

    $_SESSION['year'] = date('Y');

}


if (isset($_SESSION['sql'])) {

    $sql = $_SESSION['sql'];

//    unset($_SESSION['sql']);

} else {

$year = $_SESSION['year'];
$month = $_SESSION['month'];

    $sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, OP.Opleidingnaam, O.onderdeelnaam, BCB.Bedrijf, CODD.Docent, Aantal, CO.DatumBegin as datum, 
ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen, ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag, 
CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Cursuslocatie,
CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Lesplaats
FROM cursussen C
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID
LEFT JOIN vtigercrm600.vtiger_account B ON COL.BedrijfID = B.accountid
LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID
LEFT JOIN (SELECT CursusID, CursusOnderdeelID, COUNT(CursistID) AS Aantal FROM cursusonderdeelcursisten GROUP BY CursusOnderdeelID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID
LEFT JOIN (SELECT CB.CursusID, GROUP_CONCAT(\" \",B.accountname) AS Bedrijf
                        FROM cursusbedrijven CB
                        LEFT JOIN vtigercrm600.vtiger_account AS B ON CB.BedrijfID = B.accountid
                        GROUP BY CB.CursusID) BCB ON C.CursusID = BCB.CursusID
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(\" \", CONCAT(D.Voornaam, \" \", D.Achternaam)) AS Docent
FROM cursusonderdeeldocenten COD
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID
LEFT JOIN psentity P ON C.CursusID = P.psid
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID
WHERE P.deleted = 0 AND year(CO.DatumBegin) = $year AND MONTH(CO.DatumBegin) = $month
order by C.CursusID asc, datum asc";
}

$result = $conn->query($sql);

