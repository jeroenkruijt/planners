<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 30-10-2018
     * Time: 16:01
     */

    if (isset($_GET['optie'])) {

        require_once 'opmerking.sql.php';

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

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Onderdeelnaam:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['onderdeelnaam']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                        <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Opleidingnaam:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Opleidingnaam']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Bedrijf:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Bedrijf']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Docent:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Docent']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Datum:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['datum']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Aantal:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Aantal']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Locatie:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Locatie']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label">Plaats:</label>
                                            </div>
                                            <div class="field-label is-normal">
                                                <label class="label"><?php echo $row['Plaats']; ?></label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <p class="control">
                                                      <!-- de opmerking -->
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="field is-grouped is-grouped-centered">
                                            <p class="control">
                                                <input type="submit" value="veranderen van opmerkingen" class="button is-primary" name="submit">
                                            </p>
                                            <p class="control">
                                                <input class="button is-danger" type="submit" value="terug" name="cancel">
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
    }else{

        header("location: ./");
        session_destroy();
        exit();

    }
