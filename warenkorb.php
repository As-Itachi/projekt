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

    if (isset($_SESSION['warenkorb'][$productId])) {
        unset($_SESSION['warenkorb'][$productId]);
    }
} elseif (isset($_POST['order'])) {

    $userId = $_SESSION['idBenutzer'];
    $booksInCart = $_SESSION['warenkorb'];

    try {
        $pdo->beginTransaction();

        foreach ($booksInCart as $bookId => $quantity) {

            $stmt = $pdo->prepare("INSERT INTO bestellungen (preis, idBenutzer) VALUES (?, ?)");
            $stmt->execute([$quantity, $userId]);
            $orderId = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO zt_bestellungen (idBestellungen, idBuecher) VALUES (?, ?)");
            $stmt->execute([$orderId, $bookId]);
        }

        unset($_SESSION['warenkorb']);

        $pdo->commit();
        echo "Die Bestellung wurde erfolgreich aufgegeben!";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Es gab ein Problem beim Aufgeben der Bestellung: " . $e->getMessage();
    }
}

$userId = $_SESSION['idBenutzer'];
$stmt = $pdo->prepare("SELECT idBuecher FROM warenkorb WHERE idBenutzer = :idBenutzer");
$stmt->bindParam(':idBenutzer', $userId);
$stmt->execute();
$booksInCart = $stmt->fetchAll(PDO::FETCH_COLUMN);

if (!empty($booksInCart)) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9Tneoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        function removeFromCart(bookId) {
            if (confirm("Möchten Sie dieses Buch wirklich aus dem Warenkorb entfernen?")) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = '';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'idBuecher';
                input.value = bookId;
                form.appendChild(input);

                const button = document.createElement('button');
                button.type = 'submit';
                button.name = 'remove_from_cart';
                button.value = 'true';
                button.textContent = 'Entfernen';
                form.appendChild(button);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

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
        <tbody>
            <?php foreach ($cartBooks as $book) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['titel']); ?></td>
                    <td><?php echo htmlspecialchars($book['autor']); ?></td>
                    <td><?php echo htmlspecialchars($book['preis']); ?> €</td>
                    <td>
                        <?php $quantity = ($quantities[$book['idBuecher']] ?? 1);
                        echo htmlspecialchars($quantity); ?>
                    </td>
                    <td>
                        <form method="post" action="">
                            <input type="hidden" name="idBuecher" value="<?php echo htmlspecialchars($book['idBuecher']); ?>">
                            <button type="button" class="btn btn-danger" onclick="removeFromCart(<?php echo htmlspecialchars($book['idBuecher']); ?>)">Aus Warenkorb entfernen</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="total-price">
        <h3>Gesamtpreis: <?php echo $totalPrice; ?> €</h3>
    </div>
    <form method="post"> <!-- Add the action attribute pointing to the correct PHP file -->
        <div class="checkout">
            <button type="submit" class="btn btn-primary" name="order">Bestellen</button>
        </div>
    </form>

    <?php
    include_once("./footer/footer.php");
    ?>

    <script>
        function removeFromCart(bookId) {
            if (confirm("Möchten Sie dieses Buch wirklich aus dem Warenkorb entfernen?")) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = '';

                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'remove_from_cart';
                input.value = 'true';
                form.appendChild(input);

                const bookInput = document.createElement('input');
                bookInput.type = 'hidden';
                bookInput.name = 'idBuecher';
                bookInput.value = bookId;
                form.appendChild(bookInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

    </body>

</html>