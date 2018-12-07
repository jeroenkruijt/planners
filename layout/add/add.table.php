<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 04/12/2018
 * Time: 11:09
 */


?>
<form class="signup-form" action="layout/add/add.add.php" method="post">
    <div class="table-responsive">
        <table class="table table-bordered">

            <tr>
                <td width="20%"><label>Onderdeelnaam:</label></td>
                <td width="20%">
                    <?php echo $info['onderdeelnaam']; ?>
                </td>
                <td width="70%"><input class="form-control" type="text" name="onderdeelnaam"
                                       placeholder="opmerking.."></td>
            </tr>

            <tr>
                <td width="20%"><label>Opleidingnaam:</label></td>

                <td width="20%">
                    <?php echo $info['Opleidingnaam']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="opleidingnaam"
                                       placeholder="opmerking.."></td>
            </tr>


            <tr>
                <td width="20%"><label>Bedrijf:</label></td>

                <td width="20%">
                    <?php echo $info['Bedrijven']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="bedrijf" placeholder="opmerking..">
                </td>
            </tr>

            <tr>
                <td width="20%"><label>Docent:</label></td>

                <td width="20%">
                    <?php echo $info['Docenten']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="docent" placeholder="opmerking..">
                </td>
            </tr>

            <tr>
                <td width="20%"><label>Datum:</label></td>

                <td width="20%">
                    <?php echo $info['datum']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="datum" placeholder="opmerking.."></td>
            </tr>

            <tr>
                <td width="20%"><label>Aantal:</label></td>

                <td width="20%">
                    <?php echo $info['Aantal']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="aantal" placeholder="opmerking..">
                </td>
            </tr>

            <tr>
                <td width="20%"><label>Locatie:</label></td>

                <td width="20%">
                    <?php echo $info['Locatienaam']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="locatie" placeholder="opmerking..">
                </td>
            </tr>

            <tr>
                <td width="20%"><label>Plaats:</label></td>

                <td width="20%">
                    <?php echo $info['Plaats']; ?>
                </td>

                <td width="70%"><input class="form-control" type="text" name="plaats" placeholder="opmerking..">
                </td>
            </tr>

        </table>

        <button type="submit" value="verstuur" name="submit" class="btn btn-primary btn-lg btn-block">Opsturen
        </button>
        <button type="submit" value="terug" name="submit" class="btn btn-default btn-lg btn-block">cancel</button>

    </div>
</form>
