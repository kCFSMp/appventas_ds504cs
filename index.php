<!DOCTYPE html>
<html lang="es">
<?php
$ruta = '.';
$titulo = "Aplicacion de Ventas";
require_once ("paginas/includes/cabecera.php");
?>

<body>
    <?php
    include ("paginas/includes/menu.php");
    ?>

    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-university"></i>
                <?= $titulo; ?>
            </h1>
            <hr />
        </header>
        <section>
            <article>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./img/meta_quest_2.jpg" class="d-block w-100" alt="meta">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/mini_teclado.jpg" class="d-block w-100" alt="teclado">
                        </div>
                        <div class="carousel-item">
                            <img src="./img/lavadora_13kg_lg.jpg" class="d-block w-100" alt="lavadora">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev" >
                        <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #ECE2F4; border-radius: 50%;"></span>
                        <span class="visually-hidden" >Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #ECE2F4; border-radius: 50%;"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </article>
        </section>
    </div>
<footer>
    <?php
    require_once(".\paginas\includes\pie.php");
    ?>
</footer>
</body>

</html>