<?php
    /**
     * Created by PhpStorm.
     * User: jkruijt
     * Date: 2-10-2018
     * Time: 9:33
     */

    //    deze word gebruikt in index.php om de data te showen in index

include_once 'index.sql.php';

    //echo het verwerken om het showbaar te maken, en de html code klaar maken die
?>
<div class="hero-body">
    <div class="container has-text-centered">

        <table class="table is-striped is-hoverable is-fullwidth">
            <thead>
            <tr>
                <th>Onderdeelnaam</th>
                <th>Opleidingnaam</th>
                <th>Bedrijf</th>
                <th>Docent</th>
                <th>Datum</th>
                <th>Aantal</th>
                <th>Locatie</th>
                <th>Plaats</th>
            </tr>
            </thead>
            <tbody>

            <?php
                if ($result->num_rows > 0) {

                    while ($row = mysqli_fetch_array($result)) {

                        echo "<tr><td>". $row['onderdeelnaam'] ."</td><td>" . $row['Opleidingnaam'] . "</td><td>" . $row['Bedrijf'] ."</td><td>" . $row['Docent'] . "</td><td>" . $row['datum'] .
                        "</td><td>". $row['Aantal'] ."</td><td>" . $row['Locatie'] . "</td><td>" . $row['Plaats'] . "</td></tr>";

                    }
                }
            ?>

            </tbody>
        </table>
    </div>
</div>
