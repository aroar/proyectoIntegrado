<?php
 include "index.php";
?>
<html>
<head></head>
<body>
<!-- Titulo y descripcion -->
<div class="top-content">
    <div class="container">
        <!-- filas para el texto -->
        <div class="row">
            <div class="mt-3 col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h1 class="text-center">TOP 3 ESTRENOS DE LA SEMANA</h1>
                <div class="description">
                    <p>
                    Trailers de las mejores estrenos en nuestra taquilla de esta semana.
                    </p>
                </div>
            </div>
        </div>
        <!-- FIN DEL TITULO Y DESCRIPCION -->
        <!-- Carousel row -->
        <div class="row">
            <div class="col col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <!-- Carousel -->
                <div id="carousel-example" class="carousel slide">
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example" data-slide-to="1"></li>
                        <li data-target="#carousel-example" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/aZjg3-fPU3k" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/TITXxNWGbyk" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MjgBkC1y97w" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel-example" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel-example" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- fin carousel -->
            </div>
        </div>
        <!-- fin carousel row -->
    </div>
</div>
</body>
</html>