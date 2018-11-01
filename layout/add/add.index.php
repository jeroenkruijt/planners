<?php
    /*
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 4-10-2018
     * Time: 15:27
     */

    include_once 'add.sql.php';


?>


<section class="hero is-fullheight is-dark is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-10 is-offset-1 has-text-centered">

                    <div class="box">
                        <div class="field">
                            <form class="signup-form" action="layout/add/add.add.php" method="post">

                                <div class="field is-horizontal">
                                    <div class="field-label is-normal">
                                        <label class="label">Onderdeelnaam:</label>
                                    </div>
                                    <div class="field-label is-normal">
                                        <label class="label"><?php echo $row['onderdeelnaam'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="onderdeelnaam" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Opleidingnaam'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="opleidingnaam" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Bedrijf'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="bedrijf" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Docent'];?></label>



                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered " type="text" name="docent" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['datum'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="datum" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Aantal'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="aantal" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Locatie'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="locatie" placeholder="opmerking..">
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
                                        <label class="label"><?php echo $row['Plaats'];?></label>
                                    </div>
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control">
                                                <input class="input is-hovered" type="text" name="plaats" placeholder="opmerking..">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <hr>

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