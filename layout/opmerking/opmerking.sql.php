<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 31-10-2018
 * Time: 9:09
 */

session_start();


$optie = $_GET['optie'];
$cid = $_GET['CursusID'];
$coid = $_GET['CursusonderdeelID'];
$vid = $_GET['veldid'];
$oif = $_GET['opmerkingid'];
$bid = $_GET['BID'];


if ($optie == 'change') {


    if($bid != '') {
        $sql = ' select * from opmerking left join velden on opmerking.VeldID = velden.VeldID
where OpmerkingID = ' . $oif . ' and CursusID = ' . $cid . ' and  CursusonderdeelID = ' . $coid . ' AND BedrijfID = ' . $bid . ' and opmerking.VeldID = ' . $vid;
    } else{
        $sql = ' select * from opmerking left join velden on opmerking.VeldID = velden.VeldID
where OpmerkingID = ' . $oif . ' and CursusID = ' . $cid . ' and  CursusonderdeelID = ' . $coid . '  and opmerking.VeldID = ' . $vid;
    }

    $result = $conn->query($sql);
    $info = mysqli_fetch_array($result);

    $opmerking = $info['Opmerking'];

    $veldnaam = $info['Veldnaam'];

    if($bid != '') {
        $Sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, CO.DatumEind,
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
WHERE P.deleted = 0 AND C.CursusID = $cid and CO.CursusOnderdeelID = $coid AND CB.BedrijfID = $bid";

    } else{

        $Sql = "SELECT C.CursusID, C.OpleidingID, CO.CursusOnderdeelID, CB.BedrijfID, OP.Opleidingnaam, O.onderdeelnaam, CODD.Docent, CODA.Assistent, CO.DatumBegin as datum, CO.DatumEind,
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
WHERE P.deleted = 0 AND C.CursusID = $cid and CO.CursusOnderdeelID = $coid";
    }


    $result = $conn->query($Sql);
    $info = mysqli_fetch_array($result);

    $info['cursusdatum'] = date('d-m-Y', strtotime($info['datum'])) . '</br>' . date('H:i', strtotime($info['datum'])) . ' - ' . date('H:i', strtotime($info['DatumEind']));

    if ($info['Certificatendatum'] != '') {
        $date = strtotime($info['Certificatendatum']);
        $datum = date('d-m-Y', $date);

        $info['Certificaten'] = $info['Certificaten'] . '<br>' . $datum;
    }

    if ($info['bedrag'] != '') {

        $info['Gefactureerd'] = $info['Gefactureerd'] . '<br>€' . $info['bedrag'];
    }

    $informatie = $info[$veldnaam];


} elseif ($optie == 'delete') {

    if($bid != '') {
        $delete = 'DELETE FROM opmerking where Cursusonderdeelid = '.$coid.' and Cursusid= '.$cid.' and VeldID = '.$vid .' and OpmerkingID = '. $oif .' and BedrijfID = '. $bid;
    } else{
        $delete = 'DELETE FROM opmerking where Cursusonderdeelid = '.$coid.' and Cursusid= '.$cid.' and VeldID = '.$vid .' and OpmerkingID = '. $oif ;
    }


    if ($conn->query($delete) === TRUE) {
        header("location: ./?delete=succes");
        exit();
    } else {
        header("location: ./?delete=fail");
        exit();
    }

} else {

    header("location: ./");
    exit();

}

