<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 13/11/2018
 * Time: 09:46
 */

// link voor de knoppen samestellen deze disable of de knop gebruiken als er wel een opmerking aanwezig is

if ($row['DocentID'] > 0) {
    $link = "add.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $cursusonderdeelid . "&docentid=" . $docentid . "&optie=0";
} else {
    $link = "add.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $opleidingid . "&optie=1";
}

if ($row['DocentID'] > 0) {
    $linkop = "opmerking.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $cursusonderdeelid . "&docentid=" . $docentid . "&optie=0";
} else {
    $linkop = "opmerking.php?CursusID=" . $cursusid . "&OpleidingID=" . $opleidingid . "&CursusOnderdeelID=" . $opleidingid . "&optie=1";
}


//om de knop te laten zien van het weergeven van de opmerkingen

$sql = "SELECT * FROM opmerking WHERE CursusID = $cursusid AND CursusonderdeelID = $cursusonderdeelid AND DocentID = $docentid";
$res = $conn->query($sql);


if ($res == true) {

    if ($butopmerking = mysqli_fetch_array($res)) {
        $butshow = '<td><a class="button is-primary" href="' . $linkop . ' ">bekijk opmerking</td>';
//        print_r($butopmerking);
    } else {
        $butshow = '<td><a class="button is-danger" disabled>geen opmerking aanwezig</td>';
    };


} else {
    $butshow = '<td><a class="button is-danger" disabled>geen opmerking aanwezig</td>';
}