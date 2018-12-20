<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 22/11/2018
 * Time: 15:47
 */

$output .= '
<div id="test">

</div>

 
      <div class="table-responsive">
           <table class="table is-bordered">';

foreach ($titels as $titel) {

    $titels = $titel['Veldnaam'];
    $titelids = $titel['VeldID'];

    $output .= '
                <tr >
                     <td width="10%" id="'.$titelids.'"  bgcolor="#e6e6e6"  onclick="updateFucntion(\''.$titelids.'\', \''.$coid.'\', \''.$cursusid.'\')"><label>' . $titels . '</label></td>
                     <td width="10%" id="info'.$titelids.'"  bgcolor="#e6e6e6" onclick="updateFucntion(\''.$titelids.'\', \''.$coid.'\', \''.$cursusid.'\')">' . $info[$titels] . '</td>
                ';

    if (!empty($opmerkingen)) {

        foreach ($opmerkingen as $opmerking) {

            if ($titelids == $opmerking['VeldID']) {

                $ogdate = $opmerking['datum'];
                $newdate = date("d-m-Y H:i", strtotime($ogdate));

                $output .= '<td width="80%"><strong>' . $opmerking['Opmerking'] . '</strong>
                                       -' . $opmerking['voornaam'] . ' op ' . $newdate . '</td>';



            } else {
            }
        }
    }


    $output .= '</tr>';
}
$output .= "</table><a href=\"add.php?CursusID=' . $cursusid . '&CursusonderdeelID=' . $coid . '\" class=\"btn btn-info\" role=\"button\">opmerking toevoegen</a></div>";



echo $output;

