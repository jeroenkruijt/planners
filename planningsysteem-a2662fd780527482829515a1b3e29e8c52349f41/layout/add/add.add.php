<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 5-10-2018
     * Time: 11:14
     */

    if (isset($_POST['submit'])) {

        session_start();
        require_once '../../db/db.connect.php';

        $cursusid = $_SESSION['cursusid'];
        $cursusonderdeelid = $_SESSION['cursusonderdeelid'];
        $year = $_SESSION['year'];
        $month = $_SESSION['month'];


        $onderdeelnaam = mysqli_real_escape_string($conn, $_POST['onderdeelnaam']);
        $opleidingnaam = mysqli_real_escape_string($conn, $_POST['opleidingnaam']);
        $bedrijf = mysqli_real_escape_string($conn, $_POST['bedrijf']);
        $docent = mysqli_real_escape_string($conn, $_POST['docent']);
        $datum = mysqli_real_escape_string($conn, $_POST['datum']);
        $aantal = mysqli_real_escape_string($conn, $_POST['aantal']);
        $locatie = mysqli_real_escape_string($conn, $_POST['locatie']);
        $plaats = mysqli_real_escape_string($conn, $_POST['plaats']);


        $regex = "([a-zA-Z0-9+!*(),;?&=\$_.-]+(\:[a-zA-Z0-9+!*(),;?&=\$_.-]+)?@)";



        if ($onderdeelnaam !== '') {
            if (!preg_match($regex, $onderdeelnaam)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('1', '$cursusid', '$cursusonderdeelid' ,'1', '$onderdeelnaam')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($opleidingnaam !== '') {
            if (!preg_match($regex, $opleidingnaam)) {
                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('2', '$cursusid', '$cursusonderdeelid', '1', '$opleidingnaam')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($bedrijf !== '') {
            if (!preg_match($regex, $bedrijf)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('3', '$cursusid', '$cursusonderdeelid', '1', '$bedrijf')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($docent !== '') {
            if (!preg_match($regex, $docent)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('4', '$cursusid', '$cursusonderdeelid', '1', '$docent')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($datum !== '') {
            if (!preg_match($regex, $datum)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('5', '$cursusid', '$cursusonderdeelid', '1', '$datum')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }

        }
        if ($aantal !== '') {
            if (!preg_match($regex, $aantal)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('6', '$cursusid', '$cursusonderdeelid', '1', '$aantal')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($locatie !== '') {
            if (!preg_match($regex, $locatie)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('7', '$cursusid', '$cursusonderdeelid', '1', '$locatie')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        if ($plaats !== '') {
            if (!preg_match($regex, $plaats)) {

                $sql = "INSERT INTO opmerking(VeldID, CursusID, CursusonderdeelID, UsersID, Opmerking) VALUES ('8', '$cursusid', '$cursusonderdeelid', '1', '$plaats')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

            }
        }

        header("location: ../../?status=succes");
        exit();



    } elseif ($_POST['cancel']) {

        header("location: ../../");
        exit();

    } else {

        header("location: ../../");
        exit();

    }
