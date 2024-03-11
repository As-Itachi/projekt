<?php 
    include_once('../include/dbConnection.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<style>
    .nav-list {
        border-right: 1px solid lightgray;
    }

    a {
        text-decoration: none;
        color: black;
    }

    li.active a {
        color: white;
    }
</style>

<body>
    <?php include_once('../navbar/navbar-admin.php'); ?>
    <div class="p-5 h-100 d-flex align-items-center justify-content-center">
        <div class="container p-3 border">
            <div class="row d-flex align-items-center">
                <div class="col-sm-2 pt-5 pb-5 h-100 nav-list">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="./addbooks.php">Bücher hinzufügen</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./booklist.php">Bücherliste</a>
                        </li>
                        <li class="list-group-item active">
                            <a href="./userlist.php">Benutzerliste</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center">
                    <div class="row">

                    
                    <?php


                    


                    if (
                        isset($_GET['idBenutzer']) && isset($_GET['name']) && isset($_GET['email'])
                        && isset($_GET['geburtstag']) && isset($_GET['wohnort']) && isset($_GET['plz']) && isset($_GET['nname'])
                    ) {

                        $userId = $_GET['idBenutzer'];
                        $email = $_GET['email'];
                        $name = $_GET['name'];
                        $nname = $_GET['nname'];
                        $plz = $_GET['plz'];
                        $wohnort = $_GET['wohnort'];
                        $geburtstag = $_GET['geburtstag'];
                    }



                    if (isset($_POST['loeschen'])) {


                        try {



                            $delete = $pdo->prepare("DELETE FROM benutzer WHERE idBenutzer = :idBenutzer");

                            $delete->bindParam(':idBenutzer', $_POST['idBenutzer']);

                            $delete->execute();


                            echo "Konto wurde gelöscht";
                        } catch (PDOException $e) {
                            
                            die("Das Konto konnte nicht gelöscht werden!");
                        }
                    }


                    try {
                        $statement = $pdo->prepare("SELECT * FROM benutzer");

                        $statement->execute();

                        


                        if ($statement->rowCount() > 0) {
                            while ($zeile = $statement->fetch()) {
                                echo
                                "<div class='col-md-6 d-flex flex-column'>" .
                                "<table>" .
                                    "<tr>" . "<th>Vorname: </th>" . "<td>" . $zeile['name'] . "</td>" .
                                        "</tr>" .

                                        "<tr>" .  "<th>Nachname: </th>" . "<td>" . $zeile['nname'] . "</td>" .
                                        "</tr>" .

                                        "<tr>" .  "<th>Email: </th>" . "<td>" . $zeile['email'] . "</td>" .

                                        "</tr>" .


                                        "<tr>" .  "<th>Geburtstag: </th>" . "<td>" . $zeile['geburtstag'] . "</td>" .
                                        "</tr>" .

                                        "<tr>" .  "<th>Wohnort: </th>" . "<td>" . $zeile['wohnort'] . "</td>" .
                                        "</tr>" .

                                        "<tr>" . "<th>PLZ: </th>" . "<td>" . $zeile['plz'] . "</td>" .  "</tr>" . "<tr>" .

                                        "<form method='POST'>" . //Formular zum löschen erstellt
                                        "<input type='hidden' name='idBenutzer' value='" . $zeile['idBenutzer'] . "'>" .
                                        "<td>" .  "<input class='button' name='loeschen' type='submit' value='Konto löschen'>" . "</td>" .
                                        "</form>" . "</tr>" .
                                        "</table>"
                                    . "</div>";
                            }
                        }
                        echo "</table>";
                    } catch (PDOException $ex) {
                        die("Fehler beim Ausgeben der Daten von der Datenbank!");
                    }

                    echo "</div>";



                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>






</body>

</html>