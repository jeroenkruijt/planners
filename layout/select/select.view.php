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



    include 'select.indicatie.php';

    $bgchange = $titelids;

//    echo $bgchange . '<br>';

    $output .= '<tr>
                     <td width="10%" class="' . $titelids . $coid . '"  bgcolor="' . $bgc . '"  onclick="updateFucntion(\'' . $titelids . '\', \'' . $coid . '\', \'' . $cursusid . '\', \'' . $bedrijfid . '\')"><label>' . $titels . ':</label></td>
                     
                     <td width="30%" class="' . $titelids . $coid . '"  bgcolor="' . $bgc . '" onclick="updateFucntion(\'' . $titelids . '\', \'' . $coid . '\', \'' . $cursusid . '\', \'' . $bedrijfid . '\')">' . $info[$titels] . '</td>      
               ';

    $output .= '<td width="60%" onclick=" ">';


//    print_r($opmerkingen);

    if (!empty($opmerkingen)) {

        foreach ($opmerkingen as $opmerking) {

            if ($titelids == $opmerking['VeldID']) {

                $ogdate = $opmerking['datum'];
                $newdate = date("d-m-Y H:i", strtotime($ogdate));

                $oid = $opmerking['OpmerkingID'];

                $output .= '<ul class="dropdown">
    <li style="margin-top: 15px" data-toggle="dropdown">
        <span class="myIcons" id="messages"><strong>' . $opmerking['Opmerking'] . '</strong></span>
    </li>

    <ul class="dropdown-menu">
        <li><a disabled><strong>Op ' . $newdate . '</strong></a></li>
        <li><a href="opmerking.php?CursusID='.$cursusid.'&CursusonderdeelID='.$coid.'&veldid='.$titelids.'&BID='.$bedrijfid.'&opmerkingid='.$oid.'&optie=change">Bewerken</a></li>
        <li><a href="opmerking.php?CursusID='.$cursusid.'&CursusonderdeelID='.$coid.'&veldid='.$titelids.'&BID='.$bedrijfid.'&opmerkingid='.$oid.'&optie=delete">Verwijderen</a></li>
    </ul>
</ul>';
            }
        }
    }

    $output .= '</td></tr>';
}
$output .= '</table>
<a href="add.php?CursusID='.$cursusid.'&CursusonderdeelID='.$coid.'&BID='.$bedrijfid.'" class="btn btn-primary">Opmerking plaatsen</a>
<a href="info.php?CursusID='.$cursusid.'&CursusonderdeelID='.$coid.'&BID='.$bedrijfid.'" class="btn btn-primary">Velden invullen</a>
<button type="button" align="right" class="btn btn-danger" data-dismiss="modal">Sluiten</button>

</div>';

echo $output;

