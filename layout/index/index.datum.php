<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/12/2018
 * Time: 09:15
 */

$jaar = array_combine(range(date("Y", strtotime('+2 years')), 2000), range(date("Y", strtotime('+2 years')), 2000));

$maand = array(
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '10',
    '11',
    '12',
);


?>


<form class="form-inline well" action="layout/index/datumpicker.php" method="post">
    <div class="form-group">
        <label class="control-label">jaar</label>
        <select id='jaar' name="jaar" class="form-control">

            <?php

            foreach ($jaar as $sjaar) {

                if ($sjaar != date('Y')) {

                    echo '<option>' . $sjaar . '</option>';

                } else {

                    echo '<option selected>' . $sjaar . '</option>';

                }
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="control-label">maand</label>
        <select id='maand' name="maand" class="form-control">
            <?php

            foreach ($maand as $smaand) {
                if ($smaand != date('m')) {
                    echo '<option>' . $smaand . '</option>';
                } else {
                    echo '<option selected>' . $smaand . '</option>';

                }
            }

            ?>
        </select>
    </div>

    <input name="submit" type="submit">
</form>