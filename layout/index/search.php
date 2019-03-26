<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 30/01/2019
 * Time: 09:27
 */
if (isset($_POST['submit-zoek'])) {

    require_once "../../db/db.connect.php";

    session_start();

    $year = $_SESSION['year'];
    $month = $_SESSION['month'];
    $afdelingen = $_SESSION['afdeling'];

    if (!isset($_SESSION['afdeling'])) {
        $where = ' AND year(CO.DatumBegin) = ' . $year . ' AND MONTH(CO.DatumBegin) = ' . $month;
    } else {
        $where = 'AND year(CO.DatumBegin) = ' . $year . ' AND MONTH(CO.DatumBegin) = ' . $month . ' AND AfdelingID = ' . $afdelingen;
    }


    $zoek = mysqli_escape_string($conn, $_POST['zoek']);


    $sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
CASE WHEN Aantal > 0 THEN Aantal ELSE '0' END AS Aantal,
CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Cursuslocatie,
CASE WHEN CB.BedrijfID > 0 THEN  B1.accountname ELSE 'Geen bedrijf' END AS Bedrijf,
CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Lesplaats,
ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen, ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag,  ED.Overnachting
FROM cursussen C
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID
LEFT JOIN vtigercrm600.vtiger_account B ON COL.BedrijfID = B.accountid
LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID
LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID
LEFT JOIN (SELECT COC.CursusID, CC.BedrijfID, COC.CursusOnderdeelID, COUNT(COC.CursistID) AS Aantal FROM cursusonderdeelcursisten COC LEFT JOIN cursuscursisten CC ON COC.CursusID = CC.CursusID AND COC.CursistID = CC.CursistID GROUP BY COC.CursusOnderdeelID, CC.BedrijfID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID AND CB.BedrijfID = COC.BedrijfID
LEFT JOIN vtigercrm600.vtiger_account B1 ON CB.BedrijfID = B1.accountid
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Docent
FROM cursusonderdeeldocenten COD 
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
WHERE COD.Docent = 1
GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Assistent
FROM cursusonderdeeldocenten COD 
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
WHERE COD.Assistent = 1
GROUP BY COD.CursusOnderdeelID) CODA ON CO.CursusOnderdeelID = CODA.CursusOnderdeelID
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID
LEFT JOIN psentity P ON C.CursusID = P.psid
 WHERE P.deleted = 0 AND (OP.Opleidingnaam LIKE '%$zoek%' OR O.onderdeelnaam LIKE '%$zoek%' or CODD.Docent LIKE '%$zoek%' OR Aantal LIKE '%$zoek%' OR B.accountname LIKE '%$zoek%' OR  BS.ship_city  LIKE '%$zoek%' OR ED.Lunch LIKE '%$zoek%'
 OR ED.Subsidie LIKE '%$zoek%' OR ED.Certificaten LIKE '%$zoek%' OR ED.Gefactureerd LIKE '%$zoek%' OR ED.Uitnodigingen LIKE '%$zoek%' OR ED.exameninstantie LIKE '%$zoek%' or ED.Overnachting like '%$zoek%' or L.Locatienaam like '%$zoek%' 
or B.accountname like '%$zoek%' or B1.accountname like '%$zoek%' or L.Woonplaats like '%$zoek%' or BS.ship_city like '%$zoek%' or CODA.Assistent like '%$zoek%') 
 AND year(CO.DatumBegin) = $year AND MONTH(CO.DatumBegin) = $month 
order by  date(datum)asc
";

    $_SESSION['sql'] = $sql;

    header("location: ../../?zoek=" . $zoek);
    exit();

} elseif (isset($_POST['submit-unset'])) {

    session_start();
    unset($_SESSION['sql']);

    header("location: ../../");
    exit();

} else {


    header("location: ../../");
    exit();
}