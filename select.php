<?php
if (isset($_POST["employee_id"])) {

    include_once 'layout/select/select.sql.php';

    $cursusid = 4658;
    $cursusonderdeel = 970;
//        $opleidingid = 96;
    $docentid = 72;

    $output = '';

    $output .= '

      <div class="table-responsive">
           <table class="table table-bordered">';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
                <tr>
                     <td width="30%"><label>Name</label></td>
                     <td width="70%">' . $row["onderdeelnaam"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Address</label></td>
                     <td width="70%">' . $row["Opleidingnaam"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Gender</label></td>
                     <td width="70%">' . $row["Bedrijf"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Designation</label></td>
                     <td width="70%">' . $row["Docent"] . '</td>
                </tr>
                <tr>
                     <td width="30%"><label>Age</label></td>
                     <td width="70%">' . $row["datum"] . ' Year</td>
                </tr>
                ';

//            $output = print_r($row);

    }
    $output .= "</table></div>";
    echo $output;
}
?>