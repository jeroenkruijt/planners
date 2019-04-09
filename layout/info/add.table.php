<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 04/12/2018
 * Time: 11:09
 */

echo '<div class="table-responsive">';
echo '<form action="layout/info/add.add.php?CursusID=' . $cursusid . '&CursusonderdeelID=' . $coid . '&BID=' . $bid . '" method="POST">';
echo '<table class="table is-bordered">';

foreach ($titels as $titel) {

    $titels = $titel['Veldnaam'];
    $titelids = $titel['VeldID'];

    if ($titels == 'Certificaten') {

        if ($info['Certificatendatum'] != '') {
            $date = strtotime($info['Certificatendatum']);
            $datum = date('d-m-Y', $date);

            $select = $info['Certificaten'];

            $info['Certificaten'] = $info['Certificaten'] . '<br>' . $datum;
        }


        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" ><input name="' . $titels . '" type="date" class="form-control" value="' . $info['Certificatendatum'] . '"></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > <select name="select' . $titels . '" class="form-control">';
        ?>

        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($select == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="nee" <?php if ($select == 'nee') echo 'selected'; ?>>Nee</option>
        <?php
        echo '</select></td >';
        echo '</tr>';


    } elseif ($titels == 'Gefactureerd') {

        if ($info['bedrag'] != '') {

            $select = $info['Gefactureerd'];

            $info['Gefactureerd'] = $info['Gefactureerd'] . '<br>€' . $info['bedrag'];
        }

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" >    <div class="input-group"> <span class="input-group-addon">€</span>
        <input type="number" min="0.01" step="0.01"class="form-control currency" name="' . $titels . '" value="' . $info['bedrag'] . '"></td ></div>';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > <select name="select' . $titels . '" class="form-control">';
        ?>
        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($select == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="nee" <?php if ($select == 'nee') echo 'selected'; ?>>Nee</option>
        <?php
        echo '</select></td >';
        echo '</tr>';


    } elseif ($titels == 'Subsidie') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="select' . $titels . '" class="form-control">';
        ?>
        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($info[$titels] == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="SOOB" <?php if ($info[$titels] == 'SOOB') echo 'selected'; ?>>SOOB</option>
        <option value="OOM" <?php if ($info[$titels] == 'OOM') echo 'selected'; ?>>OOM</option>
        <option value="SOOB/CCV" <?php if ($info[$titels] == 'SOOB/CCV') echo 'selected'; ?>>SOOB/CCV</option>
        <option value="CCV" <?php if ($info[$titels] == 'CCV') echo 'selected'; ?>>CCV</option>
        <option value="SSWT" <?php if ($info[$titels] == 'SSWT') echo 'selected'; ?>>SSWT</option>
        <option value="SSWM" <?php if ($info[$titels] == 'SSWM') echo 'selected'; ?>>SSWM</option>
        <option value="STOOF" <?php if ($info[$titels] == 'STOOF') echo 'selected'; ?>>STOOF</option>
        <option value="SOG" <?php if ($info[$titels] == 'SOG') echo 'selected'; ?>>SOG</option>
        <option value="N.V.T." <?php if ($info[$titels] == 'nee') echo 'selected'; ?>>N.V.T.</option>
        <?php
        echo '</select></td >';
        echo '</tr>';


    } elseif ($titels == 'Exameninstantie') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="select' . $titels . '" class="form-control">';
        ?>
        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($info[$titels] == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="PBNA" <?php if ($info[$titels] == 'PBNA') echo 'selected'; ?>>PBNA</option>
        <option value="Rode Kruis" <?php if ($info[$titels] == 'Rode Kruis') echo 'selected'; ?>>Rode Kruis</option>
        <option value="Certiflex" <?php if ($info[$titels] == 'Certiflex') echo 'selected'; ?>>Certiflex</option>
        <option value="Oranje Kruis" <?php if ($info[$titels] == 'Oranje Kruis') echo 'selected'; ?>>Oranje Kruis
        </option>
        <option value="BMWT" <?php if ($info[$titels] == 'BMWT') echo 'selected'; ?>>BMWT</option>
        <option value="N.V.T." <?php if ($info[$titels] == 'nee') echo 'selected'; ?>>N.V.T.</option>
        <?php
        echo '</select></td >';
        echo '</tr>';


    } elseif ($titels == 'Uitnodigingen' || $titels == 'Lesmateriaal') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="' . $titels . '" class="form-control">';
        ?>
        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($info[$titels] == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="nee" <?php if ($info[$titels] == 'nee') echo 'selected'; ?>>Nee</option>
        <?php

        echo '</select></td >';
        echo '</tr>';

    } elseif ($titels == 'Lunch' || $titels == 'Praktijkmateriaal' || $titels == 'Overnachting') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="' . $titels . '" class="form-control">';
        ?>
        <option value="">selecteer een optie......</option>
        <option value="ja" <?php if ($info[$titels] == 'ja') echo 'selected'; ?>>Ja</option>
        <option value="N.V.T." <?php if ($info[$titels] == 'nee') echo 'selected'; ?>>N.V.T.</option>
        <?php

        echo '</select></td >';
        echo '</tr>';

    }
}


//echo '<button type="submit" value="Submit">';
echo '</table>';
echo '<button  type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Submit">Submit</button>';
echo '<a href="./" class="btn btn-default btn-lg btn-block">cancel</a>';
echo '</form>';
echo '</div>';

