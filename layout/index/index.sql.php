<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 2-10-2018
 * Time: 12:12
 */



//    thead content de namen die boven aan de colmunen staan
$sql = "SELECT * FROM velden WHERE Zichtbaar = 1 order by volgorde asc ";

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

} else {

$year = $_SESSION['year'];
$month = $_SESSION['month'];


    if (!isset($_SESSION['afdeling'])) {
        $where = 'WHERE P.deleted = 0 AND year(CO.DatumBegin) = ' . $year . ' AND MONTH(CO.DatumBegin) = ' . $month;
    } else {

        $afdelingen = $_SESSION['afdeling'];

        $where = 'WHERE P.deleted = 0 AND year(CO.DatumBegin) = ' . $year . ' AND MONTH(CO.DatumBegin) = ' . $month . ' AND AfdelingID = ' . $afdelingen;

    }


    $sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
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
$where order by date (datum)asc, CO.CursusOnderdeelID 
";

}

$result = $conn->query($sql);

//$afdelingen selector query dynamic
$afdelingen = 'SELECT A.AfdelingID, A.AfdelingNaam FROM  afdelingen A INNER JOIN psentity P ON A.AfdelingID = P.psid WHERE P.deleted = 0';

$afd = $conn->query($afdelingen);

