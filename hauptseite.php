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

                            <!-- Erste Reihe -->
                            <div class="col-md-3">
                                <div class="product-item">
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
                            
                            <!-- Zweite Reihe -->
                            <div class="col-md-3">
                                <div class="product-item">
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

                            <!-- Dritte Reihe -->
                            <div class="col-md-3">
                                <div class="product-item">
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

                            <!-- Vierte Reihe -->
                            <div class="col-md-3">
                                <div class="product-item">
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

                </div> <!-- inner container -->
            </div>
        </div>

    </section>

    <!-- Zweite Abschnitt -->
    <section id="best-selling" class="leaf-pattern-overlay">
        <div class="corner-pattern-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <figure class="products-thumb">
                                <img src="" alt="book" class="singel-image">
                            </figure>
                        </div>

                        <div class="col-md-6">
                            <div class="product-entry">
                                <h2 class="section-titel divider">Meistverkauftesten Bücher</h2>

                                <div class="products-content">
                                    <div class="author-name">test</div>
                                    <h3 class="item-title">test</h3>
                                    <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla velit tempora recusandae aperiam corrupti facilis, fugiat error veritatis provident id excepturi porro quidem laborum eaque eum perferendis at dolorum sequi.
                                    </p>
                                    <div class="item-price">20€ </div>
                                    <div class="btn-wrap">
                                        <a href="#" class="btn-accent-arrow">Kaufen Sie jetzt<i class="icon icon-ns-arrow-right"></i></a>
                                    </div>
 
                                </div>

                            </div>
                        </div>

                    </div>

                </div>

            </div>      

        </div>

    </section>

    <section id="popular-books" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="section-header align-center">
                        <div class="title">
                            <span>Exklusive</span>
                        </div>
                        <h2 class="section-title">Beliebte Bücher</h2>
                    </div>

                    <ur class="tabs">
                        <li data-tab-target="#all-genre" class="active tab">Alle Kategorien</li>
                        <li data-tab-target="#romantic" class="active tab">Romantik</li>
                        <li data-tab-target="#fictional" class="active tab">Fanatasy</li>
                        <li data-tab-target="#adventure" class="active tab">Abenteuer</li>
                    </ur>

                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">

                                <!-- Buchvorlage -->
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <!-- zweite Genre -->
                                
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <!-- dritte -->
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <!-- vierte -->
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
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
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                     </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
                                            <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                        </figure>
                                        <figcaption>
                                            <h3>Lolita</h3>
                                            <span>Vladimir Nabokov</span>
                                            <div class="item-price">17 €</div>
                                        </figcaption>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="product-item">
                                        <figure class="product-style">
                                            <img src="bilder/1.jpg" alt="book" class="product-item">
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
                                <div id="fictional" data-tab-content>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="bilder/1.jpg" alt="book" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>Lolita</h3>
                                                    <span>Vladimir Nabokov</span>
                                                    <div class="item-price">17 €</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="bilder/1.jpg" alt="book" class="product-item">
                                                    <button type="button" class="add-to-cart" data-product-tile="add-to-cart">Warenkorb</button>
                                                </figure>
                                                <figcaption>
                                                    <h3>Lolita</h3>
                                                    <span>Vladimir Nabokov</span>
                                                    <div class="item-price">17 €</div>
                                                </figcaption>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="product-item">
                                                <figure class="product-style">
                                                    <img src="bilder/1.jpg" alt="book" class="product-item">
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
                                </div> <!-- ende fictional -->
                                

                            </div> <!-- row -->

                        </div>

                    </div>  

                </div>
            </div>
        </div>
    </section>
    
</body>

</html>