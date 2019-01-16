<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 02/01/2019
 * Time: 14:03
 */?>

<form class="signup-form" action="layout/opmerking/opmerking.add.php?oif=<?php echo $oif ?>" method="post">
    <div class="table-responsive">
        <table class="table table-bordered">

            <tr>
                <td width="20%"><label><?php echo $veldnaam?>:</label></td>
                <td width="20%"><?php echo $informatie?></td>
                <td width="20%"><?php echo $opmerking?></td>
                <td width="40%"><input class="form-control" type="text" name="aanpas"
                                       placeholder="opmerking.."></td>
            </tr>

        </table>

        <button type="submit" value="verstuur" name="submit" class="btn btn-primary btn-lg btn-block">Opsturen
        </button>
<!--        <button type="submit" value="terug" name="submit" class="btn btn-default btn-lg btn-block">cancel</button>-->
        <a href="./" class="btn btn-default btn-lg btn-block">cancel</a>

    </div>
</form>
