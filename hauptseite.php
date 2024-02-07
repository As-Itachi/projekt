<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<?php

include_once("navbar/navbar.php");

?>

<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    <header id="header">
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

    <section id="billboard">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <button class="prev slick-arrow">
                        <i class="icon icon-arrow-left"></i>
                    </button>

                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">The Ruby Circle</h2>
                                <p>
                                    Als Louisa eines der seltenen Stipendien für die Highclare Academy erhält, erhofft sie sich einen Neuanfang. Nicht nur, weil sie als Studentin automatisch zum elitären Kreis des Ruby Circles zählt und ihr jeder Wunsch von den Augen abgelesen wird. Sondern
                                    auch, weil sie glaubt, dort endlich sicher vor den Lügen zu sein, die ihr Leben in einen Albtraum verwandelt haben.
                                </p>

                            </div>
                            <img src="bilder/1.jpg" alt="banner" class="banner-image">
                        </div>

                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">test</h2>
                                <p>
                                    Als Louisa eines der seltenen Stipendien für die Highclare Academy erhält, erhofft sie sich einen Neuanfang. Nicht nur, weil sie als Studentin automatisch zum elitären Kreis des Ruby Circles zählt und ihr jeder Wunsch von den Augen abgelesen wird. Sondern
                                    auch, weil sie glaubt, dort endlich sicher vor den Lügen zu sein, die ihr Leben in einen Albtraum verwandelt haben.
                                </p>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Informationen<i class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div>
                            <img src="" alt="banner" class="banner-image">
                        </div>

                        <button class="next slick-arrow">
                            <i class="icon icon-arrow-right"></i>
                        </button>

                    </div>
                </div>
            </div>

    </section>


                        <div class="section-header align-center">
                            <div class="title">
                              <span></span>
                            </div>
                            

    <section id="client-holder" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="inner-content">
                    <div class="logo-wrap">
                        <div class="grid">
                            <a href="#"><img src="" alt="client"></a>
                            <a href="#"><img src="" alt="client"></a>
                            <a href="#"><img src="" alt="client"></a>
                            <a href="#"><img src="" alt="client"></a>
                            <a href="#"><img src="" alt="client"></a>

                        </div>
                    </div>
                    <!--image-holder-->
                </div>
            </div>
        </div>
    </section>

    <section id="featured-books" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Qualitäts Bücher</span>
                        </div>
                        <h2 class="section-title">Kürzlich Veröffentlicht</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <?php
                            require_once('include/dbConnection.php');
                            try {
                                $statement = $pdo->prepare("SELECT * FROM buecher ORDER BY erscheinungsjahr DESC LIMIT 4");
                                $statement->execute();
                                echo "<table class='table'>";
                                if ($statement->rowCount() > 0) {
                                    while ($zeile = $statement->fetch()) {
                                        $titel = $zeile['titel'];
                                        $beschreibung = $zeile['beschreibung'];
                                        $id = $zeile['idBuecher'];
                                        $preis = $zeile['preis'];
                                        $autor = $zeile['autor'];
                            ?>
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="bilder/<?php echo $id ?>.jpg" alt="book" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                                </figure>
                                                <figcaption>
                                                    <h3><?php echo $titel ?></h3>
                                                    <span><?php echo $autor ?></span>
                                                    <div class="item-price"><?php echo $preis ?>€</div>
                                                </figcaption>
                                            </div>
                                        </div>
                            <?php
                                    }
                                }
                                echo "</table>";
                            } catch (PDOException $ex) {
                                die("Fehler beim Einfügen der Tabelle");
                            }
                            ?>

                        </div>

                    </div>

                </div>
                <!-- inner container -->
            </div>
        </div>

    </section>

<<<<<<< HEAD
        <section id="popular-books" class="bookshelf py-5 my-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <div class="section-header align-center">
                            <div class="title">
                                <span></span>
                            </div>
                            <h2 class="section-title">Beliebte Bücher</h2>
=======
    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header align-center">
                        <div class="title">
                            <span>Exklusive</span>
>>>>>>> 18dab59635f9a2e24b5cc2e38e0f9f382aa0ac92
                        </div>
                        <h2 class="section-title">Beliebte Bücher</h2>
                    </div>
                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                <?php
                                require_once('include/dbConnection.php');
                                try {
                                    $statement = $pdo->prepare("SELECT * FROM buecher");
                                    $statement->execute();
                                    echo "<table class='table'>";
                                    if ($statement->rowCount() > 0) {
                                        while ($zeile = $statement->fetch()) {
                                            $titel = $zeile['titel'];
                                            $beschreibung = $zeile['beschreibung'];
                                            $id = $zeile['idBuecher'];
                                            $preis = $zeile['preis'];
                                            $autor = $zeile['autor'];
                                ?>
                                            <div class="col-md-3">
                                                <div class="product-item">
                                                    <figure class="product-style">
                                                        <img src="bilder/<?php echo $id ?>.jpg" alt="book" class="product-item">
                                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                                    </figure>
                                                    <figcaption>
                                                        <h3><?php echo $titel ?></h3>
                                                        <span><?php echo $autor ?></span>
                                                        <div class="item-price"><?php echo $preis ?>€</div>
                                                    </figcaption>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                    echo "</table>";
                                } catch (PDOException $ex) {
                                    die("Fehler beim Einfügen der Tabelle");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <?php
    require_once("footer/footer.php");
    ?>

</body>

</html>