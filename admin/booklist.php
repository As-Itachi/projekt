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
<body>



<?php

echo "<div class ='loeschen'>";


try {
    $statement = $pdo->prepare("SELECT * FROM buecher");

    $statement->execute();

    echo "<table>";
    echo "<hr>";

    

    if ($statement->rowCount() > 0) {
        while ($zeile = $statement->fetch()) {
            
                echo "<tr style='font-size:20px'>" .
                    "<td style='color: purple'>" . $zeile['titel'] . "</td>" .
                    "</tr>" .
                    "<tr>" .
                   
                    "<tr>" .
                    "<th>Seitenanzahl: </th>" .
                    "<td>" . $zeile['seitenanzahl'] . "</td>" .
                    "</tr>" .
                    "<th>Erscheinungsjahr: </th>" .
                    "<td>" . $zeile['erscheinungsjahr'] . "</td>" .
                    "</tr>"
                    ."<td>". "<input type='submit' name='loeschen' value='löschen'> <br>" ."</td>" ;
            
                    
        }
    }

   

    echo "</table>";

   


} catch (PDOException $ex) {
    die("Fehler beim Ausgeben der Daten von der Datenbank!");
}

echo "</div>";

?>







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
                        <li class="list-group-item">
                            <a href="./userlist.php">Benutzerliste</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center">
                   <?php #TODO: Bücherliste Hinzufügen, mit Lösch und Bearbeitungsoptionen [Tyler] ?>
                </div>
            </div>
        </div>
    </div>

   

</body>
</html>