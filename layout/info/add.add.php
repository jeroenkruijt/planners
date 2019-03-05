<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 16/01/2019
 * Time: 12:27
 */

if (isset($_POST['submit'])) {

    $cid = $_GET['CursusID'];
    $coid = $_GET['CursusonderdeelID'];
    $bid = $_GET['BID'];

//    print_r($_POST);
//    echo '<br>';

    include_once '../../db/db.connect.php';
//  dropdowns
    $Lunch = mysqli_real_escape_string($conn, $_POST['Lunch']);
    $selectSubsidie = mysqli_real_escape_string($conn, $_POST['selectSubsidie']);
    $selectCertificaten = mysqli_real_escape_string($conn, $_POST['selectCertificaten']);
    $selectGefactureerd = mysqli_real_escape_string($conn, $_POST['selectGefactureerd']);
    $Uitnodigingen = mysqli_real_escape_string($conn, $_POST['Uitnodigingen']);
    $Exameninstantie = mysqli_escape_string($conn, $_POST['selectExameninstantie']);
    $Lesmateriaal = mysqli_escape_string($conn, $_POST['Lesmateriaal']);
    $Praktijkmateriaal = mysqli_escape_string($conn, $_POST['Praktijkmateriaal']);
    $overnachting = mysqli_escape_string($conn, $_POST['Overnachting']);
    //inputs
    $gefact = mysqli_real_escape_string($conn, $_POST['Gefactureerd']);
    $certificaten = mysqli_real_escape_string($conn, $_POST['Certificaten']);




    if  ($bid != '') {
        $select = " select * from extradata where CursusID = '$cid' and CursusonderdeelID = '$coid' and  BedrijfID = '$bid'";
    }else {
        $select = " select * from extradata where CursusID = '$cid' and CursusonderdeelID = '$coid'";
    }


    $result = $conn->query($select);

    if (mysqli_num_rows($result) == 0) {

        if ($certificaten == ''){

            if($bid != '') {
                $insert = "INSERT INTO extradata (CursusID, CursusonderdeelID, BedrijfID, Lunch, Overnachting, Subsidie, Certificaten, Gefactureerd, bedrag, Uitnodigingen, exameninstantie, Lesmateriaal, Praktijkmateriaal) 
                                    values('$cid', '$coid', '$bid', '$Lunch', '$overnachting', '$selectSubsidie', '$selectCertificaten', '$selectGefactureerd', '$gefact','$Uitnodigingen', '$Exameninstantie', '$Lesmateriaal', '$Praktijkmateriaal')";
            } else {
                $insert = "INSERT INTO extradata (CursusID, CursusonderdeelID, Lunch, Overnachting, Subsidie, Certificaten, Gefactureerd, bedrag, Uitnodigingen, exameninstantie, Lesmateriaal, Praktijkmateriaal) 
                                    values('$cid', '$coid', '$Lunch', '$overnachting', '$selectSubsidie', '$selectCertificaten', '$selectGefactureerd', '$gefact','$Uitnodigingen', '$Exameninstantie', '$Lesmateriaal', '$Praktijkmateriaal')";

            }



        } else {


            $date = strtotime($certificaten);
            $datum = date('Y-m-d', $date);

            if($bid != '') {
                $insert = "INSERT INTO extradata (CursusID, CursusonderdeelID, BedrijfID, Lunch, Overnachting, Subsidie, Certificaten, Certificatendatum, Gefactureerd, bedrag, Uitnodigingen, exameninstantie, Lesmateriaal, Praktijkmateriaal) 
                                    values('$cid', '$coid', '$bid', '$Lunch', '$overnachting','$selectSubsidie', '$selectCertificaten', '$datum', '$selectGefactureerd', '$gefact','$Uitnodigingen', '$Exameninstantie', '$Lesmateriaal', '$Praktijkmateriaal')";
            } else {
                $insert = "INSERT INTO extradata (CursusID, CursusonderdeelID, Lunch, Overnachting, Subsidie, Certificaten, Certificatendatum, Gefactureerd, bedrag, Uitnodigingen, exameninstantie, Lesmateriaal, Praktijkmateriaal) 
                                    values('$cid', '$coid', '$Lunch', '$overnachting', '$selectSubsidie', '$selectCertificaten', '$datum', '$selectGefactureerd', '$gefact','$Uitnodigingen', '$Exameninstantie', '$Lesmateriaal', '$Praktijkmateriaal')";

            }
        }

        if ($conn->query($insert) === TRUE) {
        header("location: ../../?status=succes");
            echo $insert;
            exit();
        } else {
        header("location: ../../");
            echo $insert;

            exit();
        }

    } else {

        if ($certificaten == ''){
        $update = "UPDATE extradata SET Lunch='$Lunch', Overnachting='$overnachting', Subsidie='$selectSubsidie', Certificaten='$selectCertificaten', Gefactureerd='$selectGefactureerd', bedrag='$gefact',
Uitnodigingen='$Uitnodigingen', exameninstantie='$Exameninstantie', Lesmateriaal='$Lesmateriaal', Praktijkmateriaal='$Praktijkmateriaal' WHERE CursusID = '$cid' and CursusonderdeelID = '$coid'";

    } else {

            $date = strtotime($certificaten);
            $datum = date('Y-m-d', $date);

            $update = "UPDATE extradata SET Lunch='$Lunch', Overnachting='$overnachting', Subsidie='$selectSubsidie', Certificaten='$selectCertificaten', Certificatendatum='$datum' ,Gefactureerd='$selectGefactureerd', bedrag='$gefact',
Uitnodigingen='$Uitnodigingen', exameninstantie='$Exameninstantie', Lesmateriaal='$Lesmateriaal', Praktijkmateriaal='$Praktijkmateriaal' WHERE CursusID = '$cid' and CursusonderdeelID = '$coid'";

        }

        if ($conn->query($update) === TRUE) {
        header("location: ../../?status=succes");
//            echo $update;
            exit();
        } else {
        header("location: ../../");
//            echo $update;

            exit();
        }
    }


} else {
    header("location: ../../");
    exit();
}


