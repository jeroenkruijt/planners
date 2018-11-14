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

//    print_r($opmerkingen);

    if (empty($opmerkingen)) {

        echo "<script>
alert('Er zijn nog geen opmerkingen geplaats voor deze cursus.');
window.location.href='layout/opmerking/opmerking.buttonfun.php" . $parameters . "';
</script>";
    }

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

                                        $titels = $titel['Veldnaam'];
                                        $titelids = $titel['VeldID'];

                                        ?>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $titels; ?>:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $info[$titels] ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field ">
                                                    <p class="control is-center">

                                                        <?php
                                                        if (!empty($opmerkingen)) {

                                                            foreach ($opmerkingen as $opmerking) {

                                                                if ($titelids == $opmerking['VeldID']) {

                                                                    $ogdate = $opmerking['datum'];
                                                                    $new = date("d-m-Y H:i", strtotime($ogdate));

                                                                    echo '<strong>' . $opmerking['Opmerking'] . '</strong>';
                                                                    echo '<br>';
                                                                    echo '- Door: ' . $opmerking['voornaam'] . ' op ' . $new;
                                                                    echo '<br>';

                                                                }

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
                                            <input type="submit" value="verander opmerking" class="button is-primary"
                                                   name="submit">
                                        </p>
                                        <p class="control">
                                            <input type="submit" value="terug" class="button is-danger" name="cancel">
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
