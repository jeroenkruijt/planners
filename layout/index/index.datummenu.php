<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 18/12/2018
 * Time: 09:15
 */

$jaar = array_combine(range(date("Y", strtotime('+2 years')), 2000), range(date("Y", strtotime('+2 years')), 2000));

?>

<div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav pager">
        <form class="form-inline well" action="layout/index/datumpicker.php" method="post">
            <div class="form-group">
                <label class="control-label">Jaar:</label>
                <select id='jaar' name="jaar" class="form-control">

                    <?php

                    foreach ($jaar as $sjaar) {

                        if (isset ($_SESSION['year'])) {

                            $urljaar = $_SESSION['year'];

                            if ($sjaar != $urljaar) {

                                echo '<option>' . $sjaar . '</option>';

                            } else {

                                echo '<option selected>' . $sjaar . '</optionselected>';

                            }

                        } else {

                            if ($sjaar != date('Y')) {

                                echo '<option>' . $sjaar . '</option>';

                            } else {

                                echo '<option selected>' . $sjaar . '</option>';

                            }
                        }
                    }

                    ?>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Maand:</label>
                <select id="maand" name="maand" class="form-control">

                    <?php


                    for ($m = 1; $m < 13; $m++) {

                        if (isset($_SESSION['month'])) {

                            $urlmaand = $_SESSION['month'];

                            if ($m != $urlmaand) {

                                echo '<option>' . $m . '</option>';

                            } else {

                                echo '<option selected>' . $m . '</option>';

                            }

                        } else {

                            if ($m != date('m')) {

                                echo '<option>' . $m . '</option>';

                            } else {

                                echo '<option selected>' . $m . '</option>';

                            }

                        }


                    }

                    ?>
                </select>

                <label class="control-label">Afdelingen:</label>
                <select id="afdelingen" name="afdelingen" class="form-control">

                    <option>Alle afdelingen</option>

                    <?php


                    while ($afdelingen = $afd->fetch_assoc()) {

                        if ($afdelingen['AfdelingID'] != $_SESSION['afdeling']) {

                            echo '<option value="' . $afdelingen['AfdelingID'] . '">' . $afdelingen['AfdelingNaam'] . '</option>';

                        } else {

                            echo '<option value="' . $afdelingen['AfdelingID'] . '" selected>' . $afdelingen['AfdelingNaam'] . '</option>';

                        }
                    }

                    ?>
                </select>
            </div>
            <button name="submit" type="submit" class="btn btn-default">selecteren</button>

        </form>
    </ul>
    <ul class="nav navbar-nav pager">
        <form class="form-inline well" action="layout/index/search.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="zoek" placeholder="zoeken.....">
                <button type="submit" name="submit-zoek" class="btn btn-default">Zoek</button>
                <?php
                if (isset($_SESSION['zoekterm'])) {

                    echo '<label class="control-label">U huidige zoekterm: </label> ';
                    echo ' ' . $_SESSION['zoekterm'] . ' ';
                    }
                    echo ' <button type="submit" name="submit-unset" class="btn btn-danger">Verwijder zoekterm</button>';


                ?>
            </div>
        </form>
    </ul>
</div>
