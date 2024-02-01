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
        <div>
            <h5>Neue Bücher</h5>
            <h1>Die beliebtesten Bücher diesen Jahres</h1>
            <p>Wir haben die besten Werke</p>
            <button>Kaufe jetzt</button>
        </div>
    </section>
    
    <?php 
    include('footer/footer.php');
    ?>
</body>

</html>
