<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/01/2019
 * Time: 11:24
 */

include_once 'db/db.connect.php';
include_once 'layout/index/index.sql.php';

$output = '';

$output .= 'hoi';

$output .= '<thead >
                <tr>';

if ($thead->num_rows > 0) {


    while ($row = mysqli_fetch_array($thead)) {

        $ogt = $row['Veldnaam'];
        $id = $row['VeldID'];

        $titel = ucfirst($ogt);

        echo "<th id='fixed'>" . $titel . "</th>";

        $veldnaam[] = $ogt;
        $veldid[] = $id;

    }

}

$output .= '</tr>
    </thead>
    <tbody>';

$cursusid = $row['CursusID'];

$acount = count($veldnaam);

if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_array($result)) {
        //datetime format veranderen van Y-m-d naar d-m-Y en H:i weg halen bij de datetime en apart
        $row['cursusdatum'] = date('d-m-Y', strtotime($row['datum']));
        $row['Cursustijd'] = date('H:i', strtotime($row['datum']));

        // header tussen andere cursusids te plaatse
        if ($cursusid !== $row['CursusID']) {
            $output .= "<tr class='showModal'>";
            $output .= "<th colspan='100%'>" . $row['Opleidingnaam'] . "</th>";
            $output .= "</tr>";
        }

        // staan hier zodat de functie hierboven niet al de volgende var krijg en dus niet meer functioneert
        $cursusid = $row['CursusID'];
        $coid = $row['CursusOnderdeelID'];

        //indicatie include om aan te geven dat er een opmerking aanwezig is
        include 'layout/index/index.indicatie.php';

        // informatie die in de tabel komt
        $output .= "<tr class='view_data' onclick='modalFucntion(\"" . $cursusid . "\",\"" . $coid . "\")' >";

        for ($count = 0; $count < $acount; $count++) {

            $info = $veldnaam[$count];

            $output .= "<td  id='" . $veldid[$count] . $coid . "' bgcolor='" . $bgcolor . "' style=''>" . $row[$info] . "</td>";

        }

        $output .= "</tr>";

    }

}

$output .= '    </tbody>
';

echo $output;