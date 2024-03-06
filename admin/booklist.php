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
        try {
            $statement = $pdo->prepare("SELECT * FROM buecher");
            $statement->execute();
            $books = $statement->fetchAll();


        } catch (PDOException $ex) {
            die("Fehler beim Ausgeben der Daten von der Datenbank!");
        }
        if (
            isset($_GET['idBuecher']) && isset($_GET['seitenanzahl']) && isset($_GET['erscheinungsjahr']) && isset($_GET['titel'])
            && isset($_GET['beschreibung']) && isset($_GET['preis']) && isset($_GET['genre']) && isset($_GET['autor'])
        ) {

            $id = $_GET['idBuecher'];
            $seitenzahl = $_GET['seitenanzahl'];
            $erscheinungsdatum = $_GET['erscheinungsjahr'];
            $titel = $_GET['titel'];
            $beschreibung = $_GET['beschreibung'];
            $preis = $_GET['preis'];
            $genre = $_GET['genre'];
            $autor = $_GET['autor'];
        }



        if (isset($_POST['loeschen'])) {


            try {



                $delete = $pdo->prepare("DELETE FROM buecher WHERE idBuecher = :idBuecher");

                $delete->bindParam(':idBuecher', $_POST['idBuecher']);

                $delete->execute();


                echo "Buch wurde gelöscht";
            } catch (PDOException $e) {
                die("Das Buch konnte nicht gelöscht werden!");
            }
        }
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
                <div class="col-md-10 d-flex flex-column ">
                    <div class="row">
                    <?php foreach ($books as $book) : ?>
                    <div class="col-md-6">
                        <div class="book">
                            <p class="title">Titel: <?php echo $book['titel'] ?></p> 
                            <p>Autor: <?php echo $book['autor'] ?></p>
                            <p>Preis: <?php echo $book['preis'] ?>€</p>
                            <p>Seitenanzahl: <?php echo $book['seitenanzahl'] ?></p>
                            <p>Erscheinungsjahr: <?php echo $book['erscheinungsjahr'] ?></p>
                            <input type='submit' class='button' name='loeschen' value='Löschen'>
                        </div>
                    </div>
                    
                    <?php endforeach; ?>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>

    
   

</body>
</html>