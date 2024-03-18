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

if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $userId = $_SESSION['idBenutzer'];
    $quantity = $_POST['menge'];

    $stmt = $pdo->prepare("INSERT INTO warenkorb (idBenutzer, idBuecher, menge) VALUES (:idBenutzer, :idBuecher, :menge)");
    $stmt->bindParam(':idBenutzer', $userId);
    $stmt->bindParam(':idBuecher', $productId);
    $stmt->bindParam(':menge', $quantity);
    $stmt->execute();

    header('Location: hauptseite.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <style>
        img {

            display: block;
            margin: 0 auto;
            margin-bottom: 10px;
            height: 350px;
            width: 250px;
            height: 350px;
            width: 250px;

        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;

        }

        .add-to-cart {
            margin-right: 5px;

        }

        .product-item {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);
            background-color: #fff;
        }

        .add-to-cart {
            background: white;
            border: 1px solid mediumpurple;
            color: mediumpurple;
            padding: 5px 10px;
            transition: ease-in-out 0.25s;
        }

        .add-to-cart:hover {
            background: mediumpurple;
            color: white;
            transition: ease-in-out 0.25s;
        }

        .menge {
            border: 1px solid mediumpurple;
            color: mediumpurple;
            padding: 5px 10px;
            width: 50px;
        }

        figcaption {
            height: 8.5em;
            margin-bottom: 20px;
            color: black;
            font-style: italic;
            padding: 1px;
            text-align: center;
        }
    </style>

    <?php
    include_once("navbar/navbar.php");
    ?>

    <div class="container">
        <h1>Suchergebnisse für "<?php echo $searchTerm; ?>"</h1>
        <?php if (!empty($searchResults)) : ?>
            <div class="row">
                <?php foreach ($searchResults as $book) : ?>
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
        <?php else : ?>
            <p>Keine Ergebnisse gefunden.</p>
        <?php endif; ?>
    </div>

    <?php include_once("footer/footer.php"); ?>
</body>

</html>