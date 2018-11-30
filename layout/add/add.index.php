<?php
/*
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 4-10-2018
 * Time: 15:27
 */

include_once 'add.sql.php';


?>

<div class="container" style="width:1500px;">
    <h3 align="center">Plaatsen van de opmerking</h3>
    <br/>
    <form class="signup-form" action="layout/add/add.add.php" method="post">
        <div class="table-responsive">
            <table class="table table-bordered">

                <tr>
                    <td width="15%"><label>Onderdeelnaam:</label></td>
                    <td width="15%"><?php echo $row['onderdeelnaam']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="onderdeelnaam"
                                           placeholder="opmerking.."></td>
                </tr>

                <tr>
                    <td width="15%"><label>Opleidingnaam:</label></td>
                    <td width="15%"><?php echo $row['Opleidingnaam']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="opleidingnaam"
                                           placeholder="opmerking.."></td>
                </tr>

                <tr>
                    <td width="15%"><label>Bedrijf:</label></td>
                    <td width="15%"><?php echo $row['Bedrijf']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="bedrijf" placeholder="opmerking..">
                    </td>
                </tr>

                <tr>
                    <td width="15%"><label>Docent:</label></td>
                    <td width="15%"><?php echo $row['Docent']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="docent" placeholder="opmerking..">
                    </td>
                </tr>

                <tr>
                    <td width="15%"><label>Datum:</label></td>
                    <td width="15%"><?php echo $row['datum']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="datum" placeholder="opmerking.."></td>
                </tr>

                <tr>
                    <td width="15%"><label>Aantal:</label></td>
                    <td width="15%"><?php echo $row['Aantal']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="aantal" placeholder="opmerking..">
                    </td>
                </tr>

                <tr>
                    <td width="15%"><label>Locatie:</label></td>
                    <td width="15%"><?php echo $row['Locatie']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="locatie" placeholder="opmerking..">
                    </td>
                </tr>

                <tr>
                    <td width="15%"><label>Plaats:</label></td>
                    <td width="15%"><?php echo $row['Plaats']; ?></td>
                    <td width="70%"><input class="form-control" type="text" name="plaats" placeholder="opmerking..">
                    </td>
                </tr>

            </table>

            <button type="submit" value="verstuur" name="submit" class="btn btn-primary btn-lg btn-block">op sturen
            </button>
            <button type="submit" value="terug" name="submit" class="btn btn-default btn-lg btn-block">cancel</button>

        </div>
    </form>
</div>

