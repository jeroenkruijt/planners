<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 15/11/2018
 * Time: 17:00
 */

$cursusid = $_POST["cursusid"];
$coid = $_POST["coid"];


$output = '';

// code om de waarden van de gegevens te pakken aan de hand van de volgende id's cursus id, cursusonderdeel id en docent id
$query = "SELECT C.CursusID, C.OpleidingID, CB.BedrijfID, CO.CursusOnderdeelID, D.DocentID, OP.Opleidingnaam, O.onderdeelnaam, B.accountname AS Bedrijf, CONCAT(d.Voornaam, \" \", d.Achternaam) AS Docent, date(co.DatumBegin) AS datum, COL.LocatieID, COL.BedrijfID, Aantal,
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid AND CO.CursusOnderdeelID = $coid";

$content = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($content)) {

    $info = $row;

}


//hier komt de code om de veld waarden voor de titel van de gegevens te halen
$velden = "SELECT * FROM velden WHERE AfdelingID = 0";

$result = mysqli_query($conn, $velden);

while ($row = mysqli_fetch_array($result)) {

    $titels[] = $row;
}

// opmerking uit de db halen
$opmerking = "SELECT VeldID, Opmerking, datum, u.voornaam FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid ";

$res = mysqli_query($conn, $opmerking);

while ($row = mysqli_fetch_array($res)) {

    $opmerkingen[] = $row;

}
