<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 2-10-2018
     * Time: 9:33
     */

    //    deze word gebruikt in index.php om de data te showen in index

    include_once 'index.sql.php';

    require_once 'index.javascript.php';

    //echo het verwerken om het showbaar te maken, en de html code klaar maken die
?>
<div class="hero-body" xmlns="http://www.w3.org/1999/html">
    <div class="container has-text-centered">

        <button class="button showModal">Show</button>

        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
            <tr>
                <?php
                    if ($thead->num_rows > 0) {

                        while ($row = mysqli_fetch_array($thead)) {

                            echo "<th>" . $row['Veldnaam'] . "</th>";

                        }
                    }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
                if ($result->num_rows > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        if ($row['DocentID'] > 0) {
                            $link = "details.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&docentid=" . $row['DocentID'] . "&optie=0";
                        } else {
                            $link = "details.php?CursusID=" . $row['CursusID'] . "&OpleidingID=" . $row['OpleidingID'] . "&CursusOnderdeelID=" . $row['CursusOnderdeelID'] . "&optie=1";

                        }

//                        onclick='window.location.href=\"" . $link . "\"'
                        echo "<tr class='showModal'>";
                        echo "<td>" . $row['onderdeelnaam'] . "</td>";
                        echo "<td>" . $row['Opleidingnaam'] . "</td>";
                        echo "<td>" . $row['Bedrijf'] . "</td>";
                        echo "<td>" . $row['Docent'] . "</td>";
                        echo "<td>" . $row['datum'] . "</td>";
                        echo "<td>" . $row['Aantal'] . "</td>";
                        echo "<td>" . $row['Locatie'] . "</td>";
                        echo "<td>" . $row['Plaats'] . "</td>";
                        echo "</tr>";

                        //de include voor het toevoegen van het scherm van de popup
                        include_once "index.modal.php";

                    }
                    echo "</tbody>";
                    echo "</table>";
                }

            ?>

        <script>

            $(".showModal").click(function () {
                $(".modal").addClass("is-active");
            });

            $(".closemodal").click(function () {
                $(".modal").removeClass("is-active");
            });

            $(".delete").click(function () {
                $(".modal").removeClass("is-active");
            });

        </script>
    </div>
</div>
