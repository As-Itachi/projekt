<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knjižara - Hauptseite</title>
    <link rel="stylesheet" type="text/css" href="css/singelproduct.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php include('navbar/navbar.php'); ?>

    <section class="container singel-product my-5 pt-5">
        <div class="row mt-5">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="bilder/1.jpg"/>
                <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="bilder/2.jpg" width="100%" class="small-img"/>
                        </div>
                        <div class="small-img-col">
                            <img src="bilder/3.jpg" width="100%" class="small-img"/>
                        </div>
                        <div class="small-img-col">
                            <img src="bilder/4.jpg" width="100%" class="small-img"/>
                        </div>
                        <div class="small-img-col">
                            <img src="bilder/5.jpg" width="100%" class="small-img"/>
                        </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <h6>The Ruby Circle</h6>
                <h3 class="py-4">All unsere Geheimnisse</h3>
                <h2>23 €</h2>
                <input type="number" value="1"/>
                <button class="buy-btn">Zum Warenkorb</button>

            </div>


        </div>
    </section>
    
    <?php 
    include('footer/footer.php');
    ?>
</body>

</html>
