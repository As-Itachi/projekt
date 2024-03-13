<?php
session_start();
require_once('include/dbConnection.php');

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $stmt = $pdo->prepare("SELECT * FROM buecher WHERE titel LIKE :search OR autor LIKE :search");
    $stmt->bindValue(':search', "%$searchTerm%");
    $stmt->execute();
    $searchResults = $stmt->fetchAll();
} else {
    header("location: hauptseite.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suchergebnisse</title>
    <!-- Add your CSS and JS files here -->
</head>
<body>
    <div class="container">
        <h1>Suchergebnisse für "<?php echo $searchTerm; ?>"</h1>
        <?php if (!empty($searchResults)): ?>
            <div class="row">
                <?php foreach ($searchResults as $book): ?>
                    <div class="col-md-3">
                        <div class="product-item">
                            <figure class="product-style">
                                <img src="bilder/<?php echo $book['idBuecher'] ?>.jpg" alt="book" class="product-item">
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $book['idBuecher'] ?>">
                                    <div class="buttons">
                                        <button type="submit" name="add_to_cart" class="add-to-cart">Warenkorb</button>
                                        <input type="number" name="menge" class="menge" min="1" max="10" value="1">
                                    </div>
                                </form>
                            </figure>
                            <figcaption>
                                <h3><?php echo $book['titel'] ?></h3>
                                <span><?php echo $book['autor'] ?></span>
                                <div class="item-price"><?php echo $book['preis'] ?>€</div>
                            </figcaption>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Keine Ergebnisse gefunden.</p>
        <?php endif; ?>
    </div>
</body>
</html>