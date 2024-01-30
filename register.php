<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Registrieren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="p-5 h-100 d-flex align-items-center justify-content-center">
        <div class="p-5 border">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </div>
            <div class="h-100 d-flex align-items-center justify-content-center">
                <p>Registrieren</p>
            </div>
            <form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']?>">
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Email eingeben" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Passwort:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Passwort eingeben" name="pswd">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Passwort wiederholen:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Passwort wiederholen" name="pswd2">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <?php if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $pswd = $_POST['pswd'];
        $pswd2 = $_POST['pswd2'];
        if($pswd == $pswd2) {
            $pswd = password_hash($pswd, PASSWORD_DEFAULT);
            include_once 'include/dbConnection.php';
            try{
                $stmt = $pdo->prepare("INSERT INTO Benutzer (email, passwort) VALUES (:email, :passwort)");
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':passwort', $pswd);
                $stmt->execute();
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
                die();
            }
            header("Location: login.php");
        } else {
            echo "Passwords do not match";
        }
    } ?>
</body>
</html>