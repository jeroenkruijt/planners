<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 4-10-2018
 * Time: 15:26
 */

if (isset($_GET['CursusID']) || isset($_GET['CursusonderdeelID'])) {
    session_start();




    $cursusid = $_GET['CursusID'];
    $cursusonderdeel = $_GET['CursusonderdeelID'];

//    $where = 'WHERE P.deleted = 0 AND C.CursusID =' . $cursusid . ' AND CO.CursusOnderdeelID =' . $cursusonderdeel;

    $_SESSION['cursusid'] = $cursusid;
    $_SESSION['cursusonderdeelid'] = $cursusonderdeel;

    $Sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, OP.Opleidingnaam, O.onderdeelnaam, BCB.Bedrijven, CODD.Docenten, Aantal, DATE(CO.DatumBegin) as datum,
CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE 'Geen locatie' END AS Locatienaam,
CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BS.ship_city ELSE 'Geen locatie' END AS Plaats
FROM cursussen C
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID
LEFT JOIN vtigercrm600.vtiger_account B ON COL.BedrijfID = B.accountid
LEFT JOIN vtigercrm600.vtiger_accountshipads BS ON B.accountid = BS.accountaddressid
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID
LEFT JOIN (SELECT CursusID, CursusOnderdeelID, COUNT(CursistID) AS Aantal FROM cursusonderdeelcursisten GROUP BY CursusOnderdeelID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID
LEFT JOIN (SELECT CB.CursusID, GROUP_CONCAT(\" \",B.accountname) AS Bedrijven
                        FROM cursusbedrijven CB
                        LEFT JOIN vtigercrm600.vtiger_account AS B ON CB.BedrijfID = B.accountid
                        GROUP BY CB.CursusID) BCB ON C.CursusID = BCB.CursusID
LEFT JOIN (SELECT COD.CursusOnderdeelID, GROUP_CONCAT(\" \", CONCAT(D.Voornaam, \" \", D.Achternaam)) AS Docenten
FROM cursusonderdeeldocenten COD
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
GROUP BY COD.CursusOnderdeelID) CODD ON CO.CursusOnderdeelID = CODD.CursusOnderdeelID
LEFT JOIN psentity P ON C.CursusID = P.psid
WHERE P.deleted = 0 AND C.CursusID = $cursusid AND CO.CursusOnderdeelID = $cursusonderdeel";

    $result = $conn->query($Sql);
    $info = mysqli_fetch_array($result);


} else {
    header("location: ./");
    session_destroy();
    exit();

}