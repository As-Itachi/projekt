<?php
session_start();
require_once('include/dbConnection.php');

if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['idBuecher'];
    $userId = $_SESSION['idBenutzer'];
    $stmt = $pdo->prepare("DELETE FROM warenkorb WHERE idBenutzer = :idBenutzer AND idBuecher = :idBuecher");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->bindParam(':idBuecher', $productId);
    $stmt->execute();

    // Aktualisiere die Warenkorb-Session
    if (isset($_SESSION['warenkorb'][$productId])) {
        unset($_SESSION['warenkorb'][$productId]);
    }
}

$userId = $_SESSION['idBenutzer'];
$stmt = $pdo->prepare("SELECT idBuecher FROM warenkorb WHERE idBenutzer = :idBenutzer");
$stmt->bindParam(':idBenutzer', $userId);
$stmt->execute();
$booksInCart = $stmt->fetchAll(PDO::FETCH_COLUMN);

try {
    $stmt = $pdo->prepare("SELECT * FROM buecher WHERE idBuecher IN (" . implode(',', array_fill(0, count($booksInCart), '?')) . ")");
    $stmt->execute($booksInCart);
    $cartBooks = $stmt->fetchAll();

    $quantities = $pdo->prepare("SELECT idBuecher, SUM(menge) as quantity FROM warenkorb WHERE idBenutzer = :idBenutzer GROUP BY idBuecher");
    $quantities->bindParam(':idBenutzer', $userId);
    $quantities->execute();
    $quantities = $quantities->fetchAll(PDO::FETCH_KEY_PAIR);
} catch (Exception $e) {
    echo $e->getMessage();
    echo "<br>";
    echo $stmt->queryString;
}

include_once("./navbar/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9Tneoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/warenkorb.css">

</head>

<body>
    <?php
    // Calculate the total price
    $totalPrice = 0;
    foreach ($cartBooks as $book) {
        $totalPrice += $book['preis'] * ($quantities[$book['idBuecher']] ?? 1);
    }
    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titel</th>
                <th scope="col">Autor</th>
                <th scope="col">Preis</th>
                <th scope="col">Menge</th>
                <th scope="col">Aktion</th>
            </tr>
        </thead>
        <tbody> <?php foreach ($cartBooks as $book) : ?> <tr>
                    <td><?php echo $book['titel'] ?></td>
                    <td><?php echo $book['autor'] ?></td>
                    <td><?php echo $book['preis'] ?>€</td>
                    <td> <?php $quantity = ($quantities[$book['idBuecher']] ?? 1);
                            echo $quantity; ?> </td>
                    <td>
                        <form method="post"> <input type="hidden" name="idBuecher" value="<?php echo $book['idBuecher'] ?>"> <button type="submit" name="remove_from_cart" class="btn btn-danger">Aus Warenkorb entfernen</button> </form>
                    </td>
                </tr> <?php endforeach; ?> </tbody>
    </table>
    <div class="total-price">
        <h3>Gesamtpreis: <?php echo $totalPrice ?>€</h3>
    </div>
    <div class="checkout"> <button class="btn btn-primary">Zur Kasse gehen</button> </div>

    <?php
        include_once("./footer/footer.php");
    ?>

</body>

</html>