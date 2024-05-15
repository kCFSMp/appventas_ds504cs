<!DOCTYPE html>
<html lang="en">
    <?php
        $ruta = "../..";
        $titulo = "Aplicación de Ventas - Lista de Productos";
        include("../includes/cabecera.php");
    ?>
<body>
    <?php
        include("../includes/menu.php");
        include "../includes/cargar_clases.php";

        $crudproducto = new CRUDProducto();
        $rs_prod = $crudproducto->ListarProducto();
    ?>
    <div class="container mt-3">
        <header>
            <h1>
                <i class="fas fa-list-alt"></i> Lista de Productos
            </h1>
            <hr />
        </header>
        <nav>
            <div class="btn-group col-md-5" role="group">
                <a href="registrar_producto.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-plus-circle"></i> Registrar
                </a>
                <a href="consultar_producto.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-search"></i></i> Consultar
                </a>
                <a href="filtrar_producto.php" class="btn btn-outline-primary btn">
                    <i class="fas fa-filter"></i></i> Filtrar
                </a>
            </div>
        </nav>

        <section>
            <article>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-8">
                        <table class="table table-hover table-sm table-success table">
                            <tr class="table-primary">
                                <th>N°</th>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Stock Disponible</th>
                                <th colspan="3">Acciones</th>
                            </tr>
                            <?php
                            $i = 0;
                            foreach ($rs_prod as $prod) {
                                $i++;
                                ?>
                                <tr class="reg_producto">
                                    <td><?=$i?></td>
                                    <td class="codprod"><?=$prod->codigo_producto?></td>
                                    <td class="prod"><?=$prod->producto?></td>
                                    <td><?=$prod->stock_disponible?></td>
                                    <td><a href="#" class="btn_mostrar btn btn-outline-info btn"><i class="fas fa-info-circle"></i>
                                    <td><a href="#" class="btn_editar btn btn-outline-success btn"><i class="fas fa-pen-square"></i>
                                    <td><a href="#" class="btn_borrar btn btn-outline-danger btn"><i class="fas fa-trash-alt"></i>
                                </tr>
                                <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </article>
        </section>

        <?php
        include ("../includes/pie.php");
        ?>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="md_borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-danger" id="staticBackdropLabel"><i class="fas fa-trash-alt"></i> Borrar Producto </h4>
                        <button type="button" class="btn-clase" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <h5 class="card-title">¿Seguro de borar el registro?</h5>
                            <p class="card-text">
                                <span class="lbl_prod"></span> (<span class="lbl_codprod"></span>)
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>

                        <a href="#" class="btn_borrar btn btn-outline-danger">Borrar</a>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>