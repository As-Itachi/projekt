<?php
session_start();
require_once('../include/dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/benutzerprofil.css">
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
</head>

<body>
<?php include("../navbar/navbar-profil.php") ?>
<div class="p-5 h-100 d-flex align-items-center justify-content-center">
    <div class="container p-3 border">
        <div class="row d-flex align-items-center">
            <div class="col-sm-2 pt-5 pb-5 h-100 nav-list">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="./kontodaten.php">Kontodaten</a>
                    </li>
                    <li class="list-group-item">
                        <a href="./benutzerdaten.php">Benutzerdaten</a>
                    </li>
                    <li class="list-group-item active">
                        <a href="./bestellungen.php">Bestellungen</a>
                    </li>
                    <li class="list-group-item">
                        <a href="../logout.php">Abmelden</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 d-flex flex-column align-items-center">
                <form class="container-xl p-0" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
                    <div class="mb-3 mt-3">

                        <?php

                        try {
                            $statement = $pdo->prepare("SELECT * FROM bestellungen where idBenutzer = :idBenutzer");
                            $statement->bindParam(':idBenutzer', $_SESSION['idBenutzer']);

                            $statement->execute();

                            echo "<table>";


                            if ($statement->rowCount() > 0) {
                                while ($zeile = $statement->fetch()) {
                                    ?>
                                    <tr style='font-size:20px'>
                                        <th style='color: purple'>Bestellungsnummer:</th>
                                        <td><?php echo $zeile['idBestellung']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Bücher</th>
                                        <td><?php echo $zeile['titel']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Preis:</th>
                                        <td><?php echo $zeile['preis']; ?>€</td>
                                    </tr>
                                    <?php
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