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

    $zoek = mysqli_escape_string($conn, $_POST['zoek']);

    $sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, B1.accountname AS Bedrijf, CODD.Docent, Aantal, CO.DatumBegin as datum, 
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
LEFT JOIN (SELECT CursusID, CursusOnderdeelID, COUNT(CursistID) AS Aantal FROM curwsusonderdeelcursisten GROUP BY CursusOnderdeelID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID
LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID
LEFT JOIN vtigercrm600.vtiger_account B1 ON CB.BedrijfID = B1.accountid
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(' ', CONCAT(D.Voornaam, ' ', D.Achternaam)) AS Docent
FROM cursusonderdeeldocenten COD
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID
LEFT JOIN psentity P ON C.CursusID = P.psid
 WHERE P.deleted = 0 AND (OP.Opleidingnaam LIKE '%$zoek%' OR O.onderdeelnaam LIKE '%$zoek%' OR BCB.Bedrijf LIKE '%$zoek%' or CODD.Docent LIKE '%$zoek%' OR Aantal LIKE '%$zoek%' OR B.accountname LIKE '%$zoek%' OR  BS.ship_city  LIKE '%$zoek%' OR ED.Lunch LIKE '%$zoek%'
 OR ED.Subsidie LIKE '%$zoek%' OR ED.Certificaten LIKE '%$zoek%' OR ED.Gefactureerd LIKE '%$zoek%' OR ED.Uitnodigingen LIKE '%$zoek%' OR ED.exameninstantie LIKE '%$zoek%' OR CO.DatumBegin LIKE '%$zoek%') 
 AND year(CO.DatumBegin) = '$year' AND MONTH(CO.DatumBegin) = '$month'
order by C.CursusID asc";

    $_SESSION['sql'] = $sql;

    header("location: ../../");
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