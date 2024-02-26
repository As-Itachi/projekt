<?php
session_start();
require_once('include/dbConnection.php');

try {
    $userId = $_SESSION['idBenutzer'];
    $stmt = $pdo->prepare("SELECT iduecher FROM warenkorb WHERE idBenutzer = :idBenutzer");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->execute();
    $_SESSION['warenkorb'] = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $x) {
    die("Konnte nicht gespeichert werden");
}

if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['idBuecher'];
    $userId = $_SESSION['idBenutzer'];
    $stmt = $pdo->prepare("DELETE FROM warenkorb WHERE idBenutzer = :idBenutzer AND idBuecher = :idBuecher");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->bindParam(':idBuecher', $productId);
    $stmt->execute();

    if (isset($_SESSION['warenkorb'][$productId])) {
        unset($_SESSION['warenkorb'][$productId]);
    }
    header('Location: cart.php');
    exit;
} elseif (isset($_POST['order'])) {

    $userId = $_SESSION['idBenutzer'];
    $booksInCart = $_SESSION['warenkorb'];

    try {
        $pdo->beginTransaction();

        foreach ($booksInCart as $bookId) {

            $stmt = $pdo->prepare("INSERT INTO bestellungen (preis, idBenutzer) SELECT preis, :idBenutzer FROM buecher WHERE idBuecher = :bookId");
            $stmt->bindParam(':idBenutzer', $userId);
            $stmt->bindParam(':bookId', $bookId);
            $stmt->execute();
            $orderId = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO zt_bestellungen (idBestellungen, idBuecher) VALUES (:orderId, :bookId)");
            $stmt->bindParam(':orderId', $orderId);
            $stmt->bindParam(':bookId', $bookId);
            $stmt->execute();
        }

        unset($_SESSION['warenkorb']);

        $pdo->commit();
        echo "Die Bestellung wurde erfolgreich aufgegeben!";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Es gab ein Problem beim Aufgeben der Bestellung: " . $e->getMessage();
    }
    header('Location: cart.php');
    exit;
}

if (!empty($_SESSION['warenkorb'])) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM buecher WHERE idBuecher IN (" . implode(',', array_fill(0, count($_SESSION['warenkorb']), '?')) . ")");
        $stmt->execute($_SESSION['warenkorb']);
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
} else {

    $cartBooks = [];
    $quantities = [];
}

include_once("./navbar/navbar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devicewidth=device-width, initial-scale=1.0">

    <title>Knjižara - Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9Tneoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Warenkorb</h1> <?php if (!empty($cartBooks)) : ?> <table class="table">
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Autor</th>
                        <th>Preis</th>
                        <th>Menge</th>
                        <th>Aktion</th>
                    </tr>
                </thead>
                <tbody> <?php foreach ($cartBooks as $book) : ?> <tr>
                            <td><?php echo htmlspecialchars($book['titel']); ?></td>
                            <td><?php echo htmlspecialchars($book['autor']); ?></td>
                            <td><?php echo htmlspecialchars($book['preis']); ?> €</td>
                            <td> <?php $quantity = ($quantities[$book['idBuecher']] ?? 1);
                                                echo htmlspecialchars($quantity); ?> </td>
                            <td>
                                <form method="post"> <input type="hidden" name="idBuecher" value="<?php echo htmlspecialchars($book['idBuecher']); ?>"> <button type="submit" name="remove_from_cart" class="btn btn-danger">Aus Warenkorb entfernen</button> </form>
                            </td>
                        </tr> <?php endforeach; ?> </tbody>
            </table>
            <div class="total-price">
                <h3>Gesamtpreis: <?php echo array_sum($quantities) * $book['preis']; ?> €</h3>
            </div>
            <form method="post"> <button type="submit" name="order" class="btn btn-primary">Bestellen</button> </form> <?php else : ?> <p>Ihr Warenkorb ist leer.</p> <?php endif; ?>
    </div> <?php include_once("./footer/footer.php"); ?>
</body>

</html>