<!DOCTYPE html>
<html lang="es">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Información del Producto";
        include("../includes/cabecera.php");
    ?>
    <body>
        <?php
            include("../includes/menu.php");
            include "../includes/cargar_clases.php";

            if (isset($_GET["codprod"])) {
                $codprod = $_GET["codprod"];

                $crudproducto = new CRUDProducto();

                $rs_prod = $crudproducto->MostrarProductoPorCodigo($codprod);

                if(empty($rs_prod)){
                    header("location: listar_producto.php");
                }
            } else{
                header("location: listar_producto.php");
            }
        ?>
        <div class="container mt-3">
            <header>
                <h1 class="text-info">
                    <i class="fas fa-info-circle"></i> Información del Producto</h1>
                <hr/>
            </header>

            <nav>
                <a href="listar_producto.php" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Regresar
                </a>
            </nav>

            <section>
                <article>
                    <div class="row justify-content-center mt-3">
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="row g-3">
                                <div class="col-md-4">
                                        <h5 class="card-title">Código</h5>
                                        <p class="card_text"><?=$rs_prod->codigo_producto?></p>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-8">
                                        <h5 class="card-title">Producto</h5>
                                        <p class="card-text"><?=$rs_prod->producto?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Stock disponible</h5>
                                        <p class="card_text"><?=$rs_prod->stock_disponible?></p>
                                    </div>
                                    
                                    <div class="col-md-8"></div>
                                    <div class="col-md-6">
                                        <h5 class="card-title">Costo</h5>
                                        <p class="card-text"><?=$rs_prod->costo?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">% Ganancia</h5>
                                        <p class="card-text"><?= $rs_prod->ganancia * 100?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <h5 class="card-title">Precio</h5>
                                        <p class="card-text">S/ <?= number_format($rs_prod->precio, 2) ?></p>
                                    </div>
                                    <div class="col-md-8"></div>
                                    <div class="col-md-8">
                                        <h5 class="card-title">Marca</h5>
                                        <p class="card-text"><?=$rs_prod->nombre_marca?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="card-title">Categoria</h5>
                                        <p class="card_text"><?=$rs_prod->nombre_categoria?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <?php
                include("../includes/pie.php");
            ?>
        </div>
    
</body>
</html>