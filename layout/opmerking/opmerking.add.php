<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 02/01/2019
 * Time: 14:22
 */

if (isset($_POST['submit'])) {

    require_once '../../db/db.connect.php';

    $aanpas = mysqli_real_escape_string($conn, $_POST['aanpas']);


    $opmerkingid = $_GET['oif'];


    $regex = '([a-zA-Z0-9+!*(),;?&=$_.-]+(\:[a-zA-Z0-9+!*(),;?&=$_.-]+)?@)';

    if($aanpas !== ''){
        if(!preg_match($regex, $aanpas)){

            $sql ='update opmerking set Opmerking = "'.$aanpas.'" where OpmerkingID = "'.$opmerkingid.'"';

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            header("location: ../../?status=succes");
            exit();

        } else {

            header("location: ../../?status=invalid");
            exit();

        }

    } else {

        header("location: ../../?stauts=leeg");
        exit();

    }

} else {

    header("location: ../../");
    exit();

}