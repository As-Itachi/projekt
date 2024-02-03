<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

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

    <section id="billborad">

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
                            Als Louisa eines der seltenen Stipendien für die Highclare Academy erhält, erhofft sie sich einen Neuanfang. Nicht nur, weil sie als Studentin automatisch zum elitären Kreis des Ruby Circles zählt und ihr jeder Wunsch von den Augen abgelesen wird. Sondern auch, weil sie glaubt, dort endlich sicher vor den Lügen zu sein, die ihr Leben in einen Albtraum verwandelt haben.
                            </p>

                        </div>
                        <img src="bilder/1.jpg" alt="banner" class="banner-image">
                    </div>

                    <div class="slider-item">
						<div class="banner-content">
							<h2 class="banner-title">test</h2>
							<p>
                            Als Louisa eines der seltenen Stipendien für die Highclare Academy erhält, erhofft sie sich einen Neuanfang. Nicht nur, weil sie als Studentin automatisch zum elitären Kreis des Ruby Circles zählt und ihr jeder Wunsch von den Augen abgelesen wird. Sondern auch, weil sie glaubt, dort endlich sicher vor den Lügen zu sein, die ihr Leben in einen Albtraum verwandelt haben.
                            </p>
							<div class="btn-wrap">
								<a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More<i
								        class="icon icon-ns-arrow-right"></i></a>
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
					</div><!--image-holder-->
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
                            <span>Qulitäts Bücher</span>
					    </div>
						<h2 class="section-title">Kürzlich Veröffentlich</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="porduct-item">
                                    <figure class="product-style">
                                        <img src="bilder/1.jpg" alt="book" class="porduct-item">
                                        <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                    </figure>
                                    <figcaption>
                                        <h3>Lolita</h3>
                                        <span>Vladimir Nabokov</span>
                                        <div class="item-price">17 €</div>
                                    </figcaption>
                                </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    
</body>

</html>