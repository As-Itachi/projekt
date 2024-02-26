<?php
session_start();
require_once('include/dbConnection.php');

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

$stmt = $pdo->prepare("SELECT * FROM buecher ORDER BY erscheinungsjahr DESC LIMIT 4");
$stmt->execute();
$latestBooks = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT * FROM buecher");
$stmt->execute();
$allBooks = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6C6RzynM0/CUGx8H2nA81rJR7aYnKagocF2jKuOXg9FfGeT8W1uQW7LGcL7q" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></script>
    <link href="./style.css" rel="stylesheet">



    <style>
        
        figcaption {
            color: black;
            font-style: italic;
            padding: 1px;
            text-align: center;
        }


        img {

            display: block;
            margin: 0 auto;
            margin-bottom: 10px;

        }

        .buttons {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
      
        }

        .add-to-cart {
            margin-right: 5px;
          
        }

        .menge {
            width: 50px;
          
        }

    </style>
</head>

<body>

    <?php
    include_once("navbar/navbar.php");
    ?>
    <!-- Header -->
    <header id="header">
        <!-- Navbar -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <nav id="navbar">
                        <div class="main-menu stellarnav">
                            <div class="hamburger">
                                <span class="bar"></span>
                                <span class="bar"></span>
                                <span class="bar"></span>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Section for the latest books -->
    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <?php foreach ($latestBooks as $book) : ?>
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
                                            <h3><?php echo $book['titel'] ?></h3> <span><?php echo $book['autor'] ?></span>
                                            <div class="item-price"><?php echo $book['preis'] ?>€</div>
                                        </figcaption>
                                    </div>
                                </div> <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
    </section> <!-- Section for all books -->
    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="section-header align-center">
                            <div class="title"> <span></span> </div>
                        </div>
                        <h2 style="text-align: center;font-size:78px; margin-bottom:20px;" class="section-title">Beliebte Bücher</h2>
                    </div>
                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row"> <?php foreach ($allBooks as $book) : ?> <div class="col-md-3">
                                        <div class="product-item">

                                            <figcaption>
                                                <h3><?php echo $book['titel'] ?></h3> <span><?php echo $book['autor'] ?></span>
                                                <div class="item-price"><?php echo $book['preis'] ?>€</div>
                                            </figcaption>

                                            <figure class="product-style"> <img src="bilder/<?php echo $book['idBuecher'] ?>.jpg" alt="book" class="product-item">

                                                <form method="post"> <input type="hidden" name="product_id" value="<?php echo $book['idBuecher'] ?>">
                                                    <div class="buttons"> <button type="submit" name="add_to_cart" class="add-to-cart">Warenkorb</button>
                                                        <input type="number" name="menge" class="menge" min="1" max="10" value="1">
                                                    </div>
                                                </form>

                                            </figure>

                                        </div>
                                    </div> <?php endforeach; ?> </div>
                        </div>
                    </div>
                </div>
            </div>
    </section> <?php include_once("footer/footer.php"); ?>
</body>

</html>