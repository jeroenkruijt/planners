<?php
/**
 * Created by PhpStorm.
 * User: jkruijt
 * Date: 30-10-2018
 * Time: 16:01
 */

if (isset($_GET['optie'])) {

    include_once 'opmerking.sql.php';

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parameters = strstr($actual_link, '?');


    ?>

    <section class="hero is-fullheight is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-vcentered">
                    <div class="column is-10 is-offset-1 has-text-centered">

                        <div class="box">
                            <div class="field">
                                <form class="signup-form"
                                      action="layout/opmerking/opmerking.buttonfun.php<?php echo $parameters ?>"
                                      method="post">

                                    <?php
                                    foreach ($titels as $titel) {
                                        ?>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $titel['Veldnaam']; ?>:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $info['onderdeelnaam'] ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                        <?php

                                                        foreach ($opmerkingen as $opmerking) {

                                                            if ($titel['VeldID'] == $opmerking['VeldID']) {

                                                                echo $opmerking['Opmerking'];

                                                            }

                                                        }

                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <?php

                                    }

                                    ?>
                                    <div class="field is-grouped is-grouped-centered">
                                        <p class="control">
                                            <input type="submit" value="submit" class="button is-primary" name="submit">
                                        </p>
                                        <p class="control">
                                            <input class="button is-danger" type="submit" value="cancel" name="cancel">
                                        </p>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <?php

} else {

    header("location: ./");
    session_destroy();
    exit();

}
