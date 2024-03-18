<?php 
ob_start();
session_start();
require_once('../include/dbConnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/benutzerprofil.css">
    <style>
        .nav-list{
            border-right : 1px solid lightgray;
        }
        a{
            text-decoration: none;
            color: black;
        }
        li.active a{
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
                        <li class="list-group-item active">
                            <a href="./benutzerdaten.php">Benutzerdaten</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./bestellungen.php">Bestellungen</a>
                        </li>
                        <li class="list-group-item">
                            <a href="../logout.php">Abmelden</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center">
                    <form class="container-xl p-0" action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Vorname:</label>
                            <input type="text" <?php if (!is_null($_SESSION['name'])) { ?> required <?php } ?> class="form-control" name="name" id="name" value="<?php echo $_SESSION['name']?>">

                            <label for="nname" class="form-label">Nachname:</label>
                            <input type="text" <?php if (!is_null($_SESSION['nname'])) { ?> required <?php } ?> class="form-control" name="nname" id="nname" value="<?php echo $_SESSION['nname']?>">

                            <label for="wohnort" class="form-label">Adresse:</label>
                            <input type="text" <?php if (!is_null($_SESSION['wohnort'])) { ?> required <?php } ?> class="form-control" name="wohnort" id="wohnort" value="<?php echo $_SESSION['wohnort']?>">

                            <label for="plz" class="form-label">Postleitzahl:</label>
                            <input type="number" <?php if (!is_null($_SESSION['plz'])) { ?> required <?php } ?> class="form-control" name="plz" id="plz" value="<?php echo $_SESSION['plz']?>">

                            <label for="geburtstag" class="form-label">Geburtstag:</label>
                            <input type="date" <?php if (!is_null($_SESSION['plz'])) { ?> required <?php } ?> min="1950-01-01" max="<?php echo date("Y-m-d"); ?>" class="form-control" name="geburtstag" id="geburtstag" value="<?php echo $_SESSION['geburtstag']?>">
                        </div>
                    <input class="button" name="submit" type="submit" value="Benutzerdaten ändern">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $nname = $_POST['nname'];
        $wohnort = $_POST['wohnort'];
        $plz = $_POST['plz'];
        $geburtstag = $_POST['geburtstag'];
        $id = $_SESSION['idBenutzer'];
        try{
            $stmt = $pdo->prepare("UPDATE Benutzer SET name = :name, nname = :nname, wohnort = :wohnort, geburtstag = :geburtstag, plz = :plz WHERE idBenutzer = :id");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':nname', $nname);
            $stmt->bindParam(':wohnort', $wohnort);
            $stmt->bindParam(':plz', $plz);
            $stmt->bindParam(':geburtstag', $geburtstag);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $_SESSION['name'] = $name;
            $_SESSION['nname'] = $nname;
            $_SESSION['wohnort'] = $wohnort;
            $_SESSION['geburtstag'] = $geburtstag;
            $_SESSION['plz'] = $plz;
            
            header("Location: ./benutzerdaten.php?success=1");

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    ob_end_flush();
    ?>
</body>
</html>