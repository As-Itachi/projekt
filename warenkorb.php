<?php
session_start();
require_once('include/dbConnection.php');


$userFilled = true;
$user = $_SESSION['benutzerInfo'] ?? [];

if ($user) {
    foreach ($user as $field) {
        if (empty($field)) {
            $userFilled = false;
            break;
        }
    }
}

if (isset($_POST['remove_from_cart'])) {
    $productId = $_POST['idBuecher'];
    $userId = $_SESSION['idBenutzer'];
    $stmt = $pdo->prepare("DELETE FROM warenkorb WHERE idBenutzer = :idBenutzer AND idBuecher = :idBuecher");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->bindParam(':idBuecher', $productId);

    if (!$stmt->execute()) {
        echo $stmt->errorInfo();
    } else {
        if (isset($_SESSION['warenkorb'][$productId])) {
            unset($_SESSION['warenkorb'][$productId]);
        }
    }
} elseif (isset($_POST['checkout'])) {
    $userId = $_SESSION['idBenutzer'];
    $stmt = $pdo->prepare("SELECT * FROM benutzer WHERE idBenutzer = :idBenutzer");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user['name'] && $user['email'] && $user['passwort'] && $user['geburtstag'] && $user['wohnort'] && $user['plz'] && $user['nname']) {
        unset($_SESSION['warenkorb']);
        echo "Vielen Dank für Ihre Bestellung!";
    } else {
        echo "Bitte füllen Sie alle Benutzerinformationen aus, um die Bestellung abzuschließen.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9Tneoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-ZhuHct6XZuQ/yQJ3XI6tj+Py6gf+QB1+/vv71GmVIz81n8N+X5gyAxWp/2X55D+U" crossorigin="anonymous"></script>

    <?php
    // Calculate the total price
    $totalPrice = 0;
    foreach ($cartBooks as $book) {
        $totalPrice += $book['preis'] * ($quantities[$book['idBuecher']] ?? 1);
    }
    ?>

    <form method="post" action="">
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
                                <input type="hidden" name="remove_from_cart">
                                <button type="submit" class="btn btn-danger">Aus Warenkorb entfernen</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </form>
    <div class="total-price">
        <h3>Gesamtpreis: <?php echo $totalPrice; ?> €</h3>
    </div>

    <form id="remove-form" method="post" action="">
        <input type="hidden" name="idBuecher">
        <input type="hidden" name="remove_from_cart">
    </form>

    <div class="checkout">
        <?php if ($userFilled) : ?>
            <form method="post" action="">
                <button class="btn btn-primary" name="checkout" value="true">Zur Kasse gehen</button>
            </form>
        <?php else : ?>
            <p>Bitte füllen Sie alle Benutzerinformationen aus, um die Bestellung abzuschließen.</p>
        <?php endif; ?>
    </div>

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

    </body>

</html>