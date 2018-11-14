<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 13/11/2018
 * Time: 09:46
 */

//om de knop te laten zien van het weergeven van de opmerkingen

$sql = "SELECT * FROM opmerking WHERE CursusID = $cursusid AND CursusonderdeelID = $cursusonderdeelid AND DocentID = $docentid";
$res = $conn->query($sql);

if ($butopmerking = mysqli_fetch_array($res)) {
    $butshow = '<td><a class="button is-primary" href="' . $linkop . ' ">bekijk opmerking</td>';
} else {
    $butshow = '<td><a class="button is-danger" disabled>geen opmerking aanwezig</td>';
}
