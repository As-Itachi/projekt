<?php 
    include_once('../include/dbConnection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
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
                        <li class="list-group-item active">
                            <a href="./booklist.php">Bücherliste</a>
                        </li>
                        <li class="list-group-item active">
                            <a href="./userlist.php">Benutzerliste</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center">
                    <form class="container-xl p-0" action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
                        <div class="mb-3 mt-3">
                            <label for="titel" class="form-label">Titel:</label>
                            <input type="text" name="titel" id="titel">

                            <label for="beschreibung" class="form-label">Beschreibung:</label>
                            <textarea name="beschreibung" id="beschreibung" cols="30" rows="10"></textarea>

                            <label for="seitenanzahl" class="form-label">Seitenanzahl:</label>
                            <input type="number" name="seitenzahl" id="seitenzahl">

                            <label for="erscheinungsdatum" class="form-label">Erscheinungsdatum:</label>
                            <input type="date" name="erscheinungsdatum" id="erscheinungsdatum">

                            <label for="preis" class="form-label">Preis:</label>
                            <input type="number" name="preis" id="preis">
                            
                            <label for="genre" class="form-label">Genre:</label>
                            <input type="text" name="genre" id="genre">
                            
                            <label for="autor" class="form-label">Autor:</label>
                            <input type="text" name="autor" id="autor">
                        </div>
                    <input class="btn btn-primary" name="submit" type="submit" value="Benutzerdaten ändern">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>