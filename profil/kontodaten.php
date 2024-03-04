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
                            <a href="../logout.php">Abmelden</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 d-flex flex-column align-items-center">
                    <form class="container-xl p-0" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['email'] ?>">
                        </div>
                        <input class="button" name="submit" type="submit" value="Email ändern">
                        <input class="button-red" name="loeschen" type="submit" value="Konto löschen">
                    </form>
                    <?php
                    if ((isset($_POST['loeschen']) || isset($_POST['bestaetigen'])) && $_POST['button'] != "0") {
                    ?>
                        <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">

                            <label style="font-size: large; ">Wollen Sie wirklich ihr Profil löschen? </label>

                            <br> Ja <input type="radio" name="button" value="1">
                            Nein <input type="radio" name="button" value="0"> <br>

                            <input class="btn btn-danger" name="bestaetigen" type="submit" value="Bestätigen">

                        </form>

                    <?php
                        if (isset($_POST['bestaetigen']) && $_POST['button'] == "1") {


                            try {
                                require_once('../include/dbConnection.php');

                                $delete = $pdo->prepare("DELETE FROM benutzer WHERE idBenutzer = :id");
                                $delete->bindParam(':id', $_SESSION['idBenutzer']);
                                $delete->execute();

                                echo "<script>location.href = '../register.php?delete=true';</script>";
                                
                            } catch (PDOException $e) {

                                echo "Fehler beim Löschen des Kontos";
                                echo $e->getMessage();
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $id = $_SESSION['idBenutzer'];
        if ($email == $_SESSION['email']) {
            echo "Email ist bereits in Verwendung";
            die();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email ist ungültig";
            die();
        }
        if (strlen($email) > 50) {
            echo "Email ist zu lang";
            die();
        }
        try {
            $stmt = $pdo->prepare("SELECT * FROM Benutzer WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                echo "Email ist bereits in Verwendung";
                die();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
        try {
            $stmt = $pdo->prepare("UPDATE Benutzer SET email = :email WHERE idBenutzer = :id");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $_SESSION['email'] = $email;
            header("Location: ./kontodaten.php?success=1");
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
    ?>


</body>

</html>