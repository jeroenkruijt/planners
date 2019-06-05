<?php
if (isset($_POST["cursusid"])) {
    include_once 'db/db.connect.php';

    // select stament om de gegevens uit de database te halen
    include_once 'layout/select/select.sql.php';

    //informatie toevoegen aan de tabel die word in geladen in de ajax modal
    include_once 'layout/select/select.view.php';

    include_once 'layout/select/select.ajax.php';

}



 