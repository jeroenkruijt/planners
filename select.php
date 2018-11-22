<?php
if (isset($_POST["cursusid"])) {
    include_once 'db/db.connect.php';

    $cursusid = $_POST["cursusid"];
    $coid = $_POST["coid"];
    $did = $_POST["did"];

    $output = '';
//    $connect = mysqli_connect("localhost", "root", "", "testing");
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
WHERE P.deleted = 0 AND C.CursusID = $cursusid AND CO.CursusOnderdeelID = $coid and D.DocentID = $did ";

    $result = mysqli_query($conn, $query);
    $output .= '
      <div class="table">
           <table class="table is-bordered">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
                <tr>
                     <td width="30%"><label>onderdeelnaam</label></td>
                     <td width="70%">' . $row["onderdeelnaam"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Opleidingnaam</label></td>
                     <td width="70%">' . $row["Opleidingnaam"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Bedrijf</label></td>
                     <td width="70%">' . $row["Bedrijf"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Docent</label></td>
                     <td width="70%">' . $row["Docent"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>datum</label></td>
                     <td width="70%">' . $row["datum"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Aantal</label></td>
                     <td width="70%">' . $row["Aantal"] . '</td>
                </tr> 
                <tr>
                     <td width="30%"><label>Locatie</label></td>
                     <td width="70%">' . $row["Locatie"] . '</td>
                </tr> 
                <tr>
                     <td width="30%"><label>Plaats</label></td>
                     <td width="70%">' . $row["Plaats"] . '</td>
                </tr>
                ';
    }
    $output .= "</table></div>";
    echo $output;
}

