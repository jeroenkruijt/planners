<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 4-10-2018
     * Time: 15:26
     */

    $cursusid = $_GET['CursusID'];
    $opleidingid = $_GET['OpleidingID'];
    $bedrijfid = $_GET['BedrijfID'];
    $cursusonderdeel = $_GET['CursusOnderdeelID'];
    $docentid = $_GET['docentid'];
    $docent = 'and D.DocentID = '. $docentid;



    $Sql = "SELECT C.CursusID, C.OpleidingID, CB.BedrijfID, CO.CursusOnderdeelID, D.DocentID, OP.Opleidingnaam, O.onderdeelnaam, B.accountname AS Bedrijf, CONCAT(d.Voornaam, \" \", d.Achternaam) AS Docent, date(co.DatumBegin) AS datum, COL.LocatieID, COL.BedrijfID, Aantal,
CASE WHEN COL.LocatieID > 0 THEN L.Locatienaam WHEN COL.BedrijfID > 0 THEN B.accountname ELSE \"Geen locatie\" END AS Locatie,
CASE WHEN COL.LocatieID > 0 THEN L.Woonplaats WHEN COL.BedrijfID > 0 THEN BA.ship_city ELSE \"Geen locatie\" END AS Plaats
FROM cursussen C
LEFT JOIN opleidingen OP ON C.OpleidingID = OP.OpleidingID
LEFT JOIN cursusbedrijven CB ON C.CursusID = CB.CursusID
LEFT JOIN vtigercrm600.vtiger_account AS B ON CB.BedrijfID = B.accountid
LEFT JOIN cursusonderdelen CO ON C.CursusID = CO.CursusID
LEFT JOIN onderdelen O ON CO.onderdeelID = O.onderdeelID
LEFT JOIN cursusonderdeeldocenten COD ON CO.CursusOnderdeelID = COD.CursusOnderdeelID
LEFT JOIN cursusonderdeellocaties COL ON CO.CursusOnderdeelID = COL.CursusOnderdeelID
LEFT JOIN (SELECT CursusID, CursusOnderdeelID, COUNT(CursistID) AS Aantal FROM cursusonderdeelcursisten GROUP BY CursusOnderdeelID) COC ON CO.CursusOnderdeelID = COC.CursusOnderdeelID 
LEFT JOIN locaties L ON COL.LocatieID = L.LocatieID
LEFT JOIN docenten D ON COD.DocentID = D.DocentID
LEFT JOIN vtigercrm600.vtiger_accountshipads AS BA ON COL.BedrijfID = BA.accountaddressid
LEFT JOIN psentity P ON C.CursusID = P.psid
WHERE P.deleted = 0 AND C.CursusID = $cursusid AND C.OpleidingID = $opleidingid AND CO.CursusOnderdeelID = $cursusonderdeel $docent
";

    echo $Sql;

    $result = $conn->query($Sql);
    $row = mysqli_fetch_array($result);
    //    $row = $result->fetch_assoc();
    //    print_r($row);