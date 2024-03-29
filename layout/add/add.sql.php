<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 4-10-2018
 * Time: 15:26
 */

if (isset($_GET['CursusID']) || isset($_GET['CursusonderdeelID'])) {

    $cursusid = $_GET['CursusID'];
    $coid = $_GET['CursusonderdeelID'];
    $bid = $_GET['BID'];


// code om de waarden van de gegevens te pakken aan de hand van de volgende id's cursus id, cursusonderdeel id en docent id
    if ($bid != '') {
        $query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, CO.DatumEind,
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid and CO.CursusOnderdeelID = $coid AND CB.BedrijfID = $bid
";
    } else {
        $query = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, CO.DatumEind,
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
LEFT JOIN extradata ED ON C.CursusID = ED.CursusID AND CO.CursusOnderdeelID = ED.CursusonderdeelID 
LEFT JOIN psentity P ON C.CursusID = P.psid 
WHERE P.deleted = 0 AND C.CursusID = $cursusid and CO.CursusOnderdeelID = $coid 
";
    }

//    echo $query;

    $content = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_array($content)) {

        $info = $row;
        $info['cursusdatum'] = date('d-m-Y', strtotime($row['datum'])) . '</br>' . date('H:i', strtotime($row['datum'])) . ' - ' . date('H:i', strtotime($row['DatumEind']));



        if ($info['Certificatendatum'] = '1900-01-01'){
            $info['Certificatendatum'] = '';
        }

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
    $velden = "SELECT * FROM velden WHERE zichtbaar = 1 ORDER BY volgorde";

    $result = mysqli_query($conn, $velden);

    while ($row = mysqli_fetch_array($result)) {

        $titels[] = $row;
    }

// opmerking uit de db halen
    if ($bid != '') {
        $opmerking = "SELECT OpmerkingID, VeldID, Opmerking, datum, u.voornaam FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid AND BedrijfID = $bid";
    }else{
        $opmerking = "SELECT OpmerkingID, VeldID, Opmerking, datum, u.voornaam FROM opmerking 
left join users U on opmerking.UsersID = U.userid 
WHERE CursusID = $cursusid AND CursusonderdeelID = $coid ";
    }

    $res = mysqli_query($conn, $opmerking);

    while ($row = mysqli_fetch_array($res)) {

        $opmerkingen[] = $row;

    }


} else {

    header("location: ./");
    exit();

}