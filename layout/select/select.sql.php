<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 15/11/2018
 * Time: 17:00
 */

$cursusid = $_POST["cursusid"];
$coid = $_POST["coid"];
$bedrijfid = $_POST['bid'];

//echo $cursusid .' ' .$coid .' '. $bedrijfid;

$output = '';

if ($bedrijfid != '') {

// code om de waarden van de gegevens te pakken aan de hand van de volgende id's cursus id, cursusonderdeel id en docent id
    $query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid and CO.CursusOnderdeelID = $coid AND CB.BedrijfID = $bedrijfid
";

} else {

    $query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, 
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid and CO.CursusOnderdeelID = $coid
";

}
// echo  $query;
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
$velden = "SELECT * FROM velden WHERE zichtbaar = 1 order by volgorde";

$result = mysqli_query($conn, $velden);

while ($row = mysqli_fetch_array($result)) {

    $titels[] = $row;
}

// opmerking uit de db halen

if($bedrijfid != ''){
    $opmerking = "SELECT OpmerkingID, VeldID, Opmerking, datum FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid AND BedrijfID = $bedrijfid";
} else {
    $opmerking = "SELECT OpmerkingID, VeldID, Opmerking, datum FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid";
}


$res = mysqli_query($conn, $opmerking);

while ($row = mysqli_fetch_array($res)) {

    $opmerkingen[] = $row;

}
