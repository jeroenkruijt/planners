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
$query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, OP.Opleidingnaam, O.onderdeelnaam, BCB.Bedrijf, CODD.Docent, Aantal, CO.DatumBegin as datum, 
ED.Lunch, ED.Subsidie,ED.Exameninstantie, ED.Certificaten, ED.Gefactureerd, ED.Uitnodigingen,ED.Lesmateriaal, ED.Praktijkmateriaal, ED.Certificatendatum, ED.bedrag,
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid and CO.CursusOnderdeelID = $coid
";

$content = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($content)) {

//    print_r($row);

    $info = $row;

    $info['cursusdatum']  = date('d-m-Y', strtotime($row['datum']));
    $info['Cursustijd']  = date('H:i', strtotime($row['datum']));

    if ($info['Certificatendatum'] != '') {
        $date = strtotime($info['Certificatendatum']);
        $datum = date('d-m-Y', $date);

        $info['Certificaten'] = $info['Certificaten'] . '<br>' . $datum;
    }

    if ($info['bedrag'] != '') {

        $info['Gefactureerd'] = $info['Gefactureerd'] . '<br>€' . $info['bedrag'];
    }



}

//hier komt de code om de veld waarden voor de titel van de gegevens te halen
$velden = "SELECT * FROM velden WHERE zichtbaar = 1 order by VeldID";

$result = mysqli_query($conn, $velden);

while ($row = mysqli_fetch_array($result)) {

    $titels[] = $row;
}

// opmerking uit de db halen
$opmerking = "SELECT OpmerkingID, VeldID, Opmerking, datum FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid ";

$res = mysqli_query($conn, $opmerking);

while ($row = mysqli_fetch_array($res)) {

    $opmerkingen[] = $row;

}
