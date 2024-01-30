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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="p-5 h-100 d-flex align-items-center justify-content-center">
        <div class="container-fluid p-3 border">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="active" href="./kontodaten.php">Kontodaten</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./benutzerdaten.php">Benutzerdaten</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./bestellungen.php">Bestellungen</a>
                        </li>
                        <li class="list-group-item">
                            <a href="./logout.php">Abmelden</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>