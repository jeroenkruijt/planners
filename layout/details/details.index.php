<?php
    /*
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 4-10-2018
     * Time: 15:27
     */

    include_once 'details.sql.php';
?>


<section class="hero is-fullheight is-dark is-bold">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-vcentered">
                <div class="column is-10 is-offset-1 has-text-centered">

                    <div class="box">
                        <div class="field">
                            <form class="signup-form" action="details.add.php" method="post">

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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered " type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
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
                                                <input class="input is-hovered" type="text" name="veld1" placeholder="opmerking..">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="field is-grouped is-grouped-centered">
                                    <p class="control">
                                        <a class="button is-primary">
                                            Submit
                                        </a>
                                    </p>
                                    <p class="control">
                                        <a class="button is-light">
                                            Cancel
                                        </a>
                                    </p>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>