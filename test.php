<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Hauptseite</title>
    <link rel="stylesheet" type="text/css" href="css/hauptseite.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar/navbar.php'); ?>

    <section id="home">
        <div class="container">
            <h5>Neue Bücher</h5>
            <h1><span style="color: pink;">Die beliebtesten Bücher diesen Jahres</span></h1>
            <p>Wir haben die besten Werke</p>
            <button>Kaufe</button>
        </div>
    </section>

    <section id="brand" class="container">
        <div class="row">
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="bilder_test/2.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="bilder_test/2.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="bilder_test/2.jpeg" />
            <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="bilder_test/2.jpeg" />
        </div>
        
    </section>

    <section id="new" class="w-100">
        <div class="row p-0 m-0">

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="bilder/1.jpg">
                <div class="details">
                    <h2>Top Auswahl</h2>
                    <button class="text-uppercase">Kaufen</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="bilder/2.jpg">
                <div class="details">
                    <h2>Top Auswahl</h2>
                    <button class="text-uppercase">Kaufen</button>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="bilder/3.jpg">
                <div class="details">
                    <h2>Top Auswahl</h2>
                    <button class="text-uppercase">Kaufen</button>
                </div>
            </div>

        </div>

    </section>
    
    <?php 
    include('footer/footer.php');
    ?>
</body>

</html>
