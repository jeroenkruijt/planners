<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 04/12/2018
 * Time: 11:09
 */

echo '<div class="table-responsive">';
echo '<form action="layout/info/add.add.php?CursusID=' . $cursusid . '&CursusonderdeelID=' . $coid . '" method="POST">';
echo '<table class="table is-bordered">';

foreach ($titels as $titel) {

    $titels = $titel['Veldnaam'];
    $titelids = $titel['VeldID'];

    if ($titels == 'Certificaten') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" ><input name="' . $titels . '" type="date" class="form-control"></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > <select name="select' . $titels . '" class="form-control">
                                                                        <option value="ja">Ja</option>
                                                                        <option value="nee" selected>Nee</option>
                                                                    </select></td >';
        echo '</tr>';


    } elseif ($titels == 'Gefactureerd') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" >    <div class="input-group"> <span class="input-group-addon">€</span>
        <input type="number" min="0.01" step="0.01"class="form-control currency" name="'.$titels.'"></td ></div>';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > <select name="select' . $titels . '" class="form-control">
                                                                        <option value="ja">Ja</option>
                                                                        <option value="nee" selected>Nee</option>
                                                                    </select></td >';
        echo '</tr>';


    } elseif ($titels == 'Subsidie') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="select' . $titels . '" class="form-control">
                                                                        <option value="ja">Ja</option>
                                                                        <option value="SOOB">SOOB</option>
                                                                        <option value="OOM">OOM</option>
                                                                        <option value="SOOB/CCV">SOOB/CCV</option>
                                                                        <option value="CCV">CCV</option>
                                                                        <option value="SSWT">SSWT</option>
                                                                        <option value="SSWM">SSWM</option>
                                                                        <option value="STOOF">STOOF</option>
                                                                        <option value="SOG">SOG</option>
                                                                        <option value="nee" selected>Nee</option>
                                                                    </select></td >';
        echo '</tr>';


    } elseif ($titels == 'Exameninstantie') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="select' . $titels . '" class="form-control">
                                                                        <option value="ja">Ja</option>
                                                                        <option value="PBNA">PBNA</option>
                                                                        <option value="Rode Kruis">Rode Kruis</option>
                                                                        <option value="Certiflex">Certiflex</option>
                                                                        <option value="Oranje Kruis">Oranje Kruis</option>
                                                                        <option value="BMWT">BMWT</option>
                                                                        <option value="nee" selected>Nee</option>
                                                                    </select></td >';
        echo '</tr>';


    } elseif($titels == 'Lunch'  || $titels == 'Subsidie' || $titels == 'Uitnodigingen' || $titels == 'Exameninstantie'|| $titels == 'Lesmateriaal'|| $titels == 'Praktijkmateriaal') {

        echo '<tr>';
        echo '<td width = "10%" class="' . $titelids . $coid . '"  ><label > ' . $titels . '</label ></td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" > ' . $info[$titels] . '</td >';
        echo '<td width = "20%" class="' . $titelids . $coid . '" colspan = "2" > <select name="' . $titels . '" class="form-control">
                                                                        <option value="ja">Ja</option>
                                                                        <option value="nee" selected>Nee</option>
                                                                    </select></td >';
        echo '</tr>';

    }
}


//echo '<button type="submit" value="Submit">';
echo '</table>';
echo '<button  type="submit" name="submit" class="btn btn-primary btn-lg btn-block" value="Submit">Submit</button>';
echo '<a href="./" class="btn btn-default btn-lg btn-block">cancel</a>';
echo '</form>';
echo '</div>';

