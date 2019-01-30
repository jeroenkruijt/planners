<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 04/12/2018
 * Time: 11:09
 */

echo '<div class="table-responsive">';
echo '<form action="layout/add/add.add.php?CursusID=' . $cursusid . '&CursusonderdeelID=' . $coid . '" method="POST">';
echo '<table class="table is-bordered">';

foreach ($titels as $titel) {

    $titels = $titel['Veldnaam'];
    $titelids = $titel['VeldID'];


//    include '../select/select.indicatie.php';
        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width="70%" colspan="3"><input name="' . $titelids . '" class="form-control" value="" placeholder="Plaats hier uw opmerking......"></td>';
        echo '</tr>';

}

//echo '<button type="submit" value="Submit">';
echo '</table>';
echo '<button  type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Submit">Submit</button>';
echo '<a href="./" class="btn btn-default btn-lg btn-block">cancel</a>';
echo '</form>';
echo '</div>';

