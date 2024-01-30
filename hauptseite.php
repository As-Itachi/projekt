<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Hauptseite</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
            <?php
                require_once('include/dbConnection.php');
                try {
                    $statement = $pdo->prepare("SELECT * FROM buecher WHERE idBuecher % 2 = 0;");
                    $statement->execute();
                    echo "<table>";
                    if ($statement->rowCount() > 0) {
                        while ($zeile = $statement->fetch()) { 
                            $titel = $zeile['titel'];
                            $beschreibung = $zeile['beschreibung'];
                            ?>
                            <tbody>
                                <tr>
                                    <td rowspan="2">Bild</td>
                                    <td colspan="2"><?php echo $titel ?></td>                   
                                </tr>
                                <tr>                               
                                    <td><?php echo $beschreibung ?></td>           
                                    <td>3. Spalte</td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                    echo "</table>";
                } catch (PDOException $ex) {
                    die("Fehler beim Einfügen der Tabelle");
                }
            ?>
            </div>
            <div class="col-md-6">
            <?php
                require_once('include/dbConnection.php');
                try {
                    $statement = $pdo->prepare("SELECT * FROM buecher WHERE idBuecher % 2 != 0;");
                    $statement->execute();
                    echo "<table>";
                    if ($statement->rowCount() > 0) {
                        while ($zeile = $statement->fetch()) { 
                            $titel = $zeile['titel'];
                            $beschreibung = $zeile['beschreibung'];
                            ?>
                            <tbody>
                                <tr>
                                    <td rowspan="2">Bild</td>
                                    <td colspan="2"><?php echo $titel ?></td>                   
                                </tr>
                                <tr>                               
                                    <td><?php echo $beschreibung ?></td>           
                                    <td>3. Spalte</td>
                                </tr>
                            </tbody>
                            <?php
                        }
                    }
                    echo "</table>";
                } catch (PDOException $ex) {

                    die("Fehler beim Einfügen der Tabelle");
                }
            ?>
        
            </div>
        </div>
        
        

    </div>




</body>

</html>