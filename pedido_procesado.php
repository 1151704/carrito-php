<?php
$id_pedido = null;

session_start();
if (isset($_GET['id_pedido'])) {
    $id_pedido = $_GET['id_pedido'];
}
include "logica/pedido.model.php";

$pedido = get_pedido_by_id($id_pedido);
$detalles = get_detalles_pedido_by_pedido($id_pedido);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('include/head_inicio.php') ?>    

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Domicilios.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary">
                            Carrito <span class="badge badge-light"><?php echo sizeof($_SESSION["carrito"]) ?></span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row my-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                    </div>
                    <div class="card-body">
                        <?php if (sizeof($detalles) > 0) { ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio unitario</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $valor_total = 0;
                                        $cant_total = 0;
                                        foreach ($detalles as $detalle) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <strong><?php echo $detalle['nombre_producto']; ?></strong>
                                                </td>
                                                <td><?php echo $detalle['cantidad']; ?></td>
                                                <td>$ <?php echo $detalle['valor_unitario']; ?></td>
                                                <td>$ <?php echo $detalle["cantidad"] * $detalle['valor_unitario']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                                            <td>$ <?php echo $pedido['valor_total'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-warning" role="alert">
                                Pedido sin detalles
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Datos del pedido
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="logica/generar_compra.php">
                            <input type="hidden" name="total" value="<?php echo $valor_total ?>">
                            <div class="form-group">
                                <label for="inputNombre" class="control-label">Nombre del cliente</label>
                                <input type="text" disabled name="nombre" required class="form-control" id="inputNombre" value="<?php echo $pedido['nombre_cliente'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="control-label">Email del cliente</label>
                                <input type="email" disabled name="email" required class="form-control" id="inputEmail" value="<?php echo $pedido['correo_electronico_cliente'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputTel" class="control-label">Teléfono del cliente</label>
                                <input type="text" disabled name="telefono" required class="form-control" id="inputTel" value="<?php echo $pedido['telefono_cliente'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputDir" class="control-label">Dirección de entrega</label>
                                <input type="text" disabled name="direccion" required class="form-control" id="inputDir" value="<?php echo $pedido['direccion'] ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include('include/footer_inicio.php') ?> 

</body>

</html>