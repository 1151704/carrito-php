<?php
$id_tienda = null;

session_start();
if (!empty($_SESSION["id_tienda"]) && !isset($_GET['id_tienda'])) {
    $id_tienda = $_SESSION["id_tienda"];
} else {
    if (isset($_GET['id_tienda'])) {
        $id_tienda = $_GET['id_tienda'];
    }
}
include "logica/tienda.model.php";
include "logica/producto.model.php";

$tiendas = get_all_tienda();
$_SESSION["id_tienda"] = $id_tienda;
$productos = [];
if (isset($id_tienda)) {
    $productos = get_all_producto_by_tienda($id_tienda);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include('include/head_inicio.php') ?>
</head>

<body>

    <!-- Navigation -->
    <?php include('include/nav_inicio.php') ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row my-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Listado de productos
                    </div>
                    <div class="card-body">
                        <?php if (sizeof($_SESSION["carrito"]) > 0) { ?>
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
                                        foreach ($_SESSION["carrito"] as $c) {
                                            $producto = get_producto_by_id($c['id_producto']);
                                            $valor_total += $producto['precio_unitario'] * $c['cant'];
                                            $cant_total += $c['cant'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <strong><?php echo $producto['nombre']; ?></strong>
                                                </td>
                                                <td>
                                                    <form class="form-inline" method="post" action="logica/editar_carrito.php">
                                                        <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                                        <div class="form-group">
                                                            <input type="number" name="cant" style="width:100px;" value="<?php echo $c["cant"]; ?>" min="1" class="form-control" placeholder="Cantidad">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-edit"></i></button>
                                                        <a href="logica/eliminar_carrito.php?redirect=carro.php&id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></a>

                                                    </form>


                                                </td>
                                                <td>$ <?php echo $producto['precio_unitario']; ?></td>
                                                <td>$ <?php echo $c["cant"] * $producto['precio_unitario']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                                            <td>$ <?php echo $valor_total ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-warning" role="alert">
                                Carrito de compras vacio
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if (sizeof($_SESSION["carrito"]) > 0) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Formulario de pedido
                        </div>
                        <div class="card-body">
                            <form class="" method="post" action="logica/generar_compra.php">
                                <input type="hidden" name="total" value="<?php echo $valor_total ?>">
                                <div class="form-group">
                                    <label for="inputNombre" class="control-label">Nombre del cliente</label>
                                    <input type="text" name="nombre" required class="form-control" id="inputNombre">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="control-label">Email del cliente</label>
                                    <input type="email" name="email" required class="form-control" id="inputEmail">
                                </div>
                                <div class="form-group">
                                    <label for="inputTel" class="control-label">Teléfono del cliente</label>
                                    <input type="text" name="telefono" required class="form-control" id="inputTel">
                                </div>
                                <div class="form-group">
                                    <label for="inputDir" class="control-label">Dirección de entrega</label>
                                    <input type="text" name="direccion" required class="form-control" id="inputDir">
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Procesar Venta</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include('include/footer_inicio.php') ?>

</body>

</html>