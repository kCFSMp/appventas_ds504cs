<!DOCTYPE html>
<html lang="en">
<?php
$ruta = '../..';
$titulo = "Aplicacion de ventas - Lista de Ventas";
include ("../includes/cabecera.php");
?>

<body>
    <?php
    include ("../includes/menu.php");
    include ("../includes/cargar_clases.php");

    $crudventa= new CrudVenta();
    $rs_vent = $crudventa->ListarVenta();

    ?>
    <div class="container mt-3">
        <header>
            <h1><i class="fas fa-list-alt"></i>Lista de ventas</h1>
        </header>
        <hr>

        <nav></nav>

        <section>
            <article>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mx-auto">
                            <div class="row justify-content-center mt-3">
                                <div class="col-md-8">
                                    <table class="table table-hover table-sm table-success">
                                        <tr class="table-primary">
                                            <th>ID venta</th>
                                            <th>Fecha</th>
                                            <th>Venta codigo cliente</th>
                                            <th>Cliente</th>
                                            <th>Monto</th>
                                            <th>Igv</th>
                                        </tr>
                                        <?php
                                        foreach ($rs_vent as $key) { ?>
                                            <tr>
                                                <td><?php echo $key->codigo_venta; ?></td>
                                                <td><?php echo $key->fecha ?></td>
                                                <td><?php echo $key->venta_codigo_cliente ?></td>
                                                <td><?php echo $key->cliente ?></td>
                                                <td><?php echo $key->monto ?></td>
                                                <td><?php echo $key->igv ?></td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </div>


    <?php
    require_once("../includes/pie.php");
    ?>

</body>

</html>