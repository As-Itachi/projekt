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
    <style>
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
    <div class="p-5 h-100 d-flex align-items-center justify-content-center">
        <div class="container-fluid p-3 border">
            <div class="row">
                <div class="col-sm-2">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="../hauptseite.php">Hauptseite</a>
                        </li>
                        <li class="list-group-item active">
                            <a href="./kontodaten.php">Kontodaten</a>
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
                    <form action="<?php echo $_SERVER['SCRIPT_NAME']?>" method="post">
                    <div class="mb-3 mt-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control w-25" name="email" id="email" value="<?php echo $_SESSION['email']?>">
                    </div>
                    <input class="btn btn-primary" name="submit" type="submit" value="Email ändern">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $id = $_SESSION['idBenutzer'];
        if($email == $_SESSION['email']){
            echo "Email ist bereits in Verwendung";
            die();
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "Email ist ungültig";
            die();
        }
        if(strlen($email) > 50){
            echo "Email ist zu lang";
            die();
        }
        try{
            $stmt = $pdo->prepare("SELECT * FROM Benutzer WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){
                echo "Email ist bereits in Verwendung";
                die();
            }
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        try{
            $stmt = $pdo->prepare("UPDATE Benutzer SET email = :email WHERE idBenutzer = :id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $_SESSION['email'] = $email;
            header("Location: ./kontodaten.php");
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    
    ?>
</body>
</html>