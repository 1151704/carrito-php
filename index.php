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

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-4">Domicilios.com</h1>
                <div class="list-group">
                    <?php foreach ($tiendas as $tienda) { ?>
                        <a href="index.php?id_tienda=<?php echo $tienda['id_tienda'] ?>" class="list-group-item"><?php echo $tienda['nombre']; ?></a>
                    <?php } ?>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">

                <div class="row my-4">
                    <?php if (sizeof($productos) > 0) { ?>
                        <?php foreach ($productos as $producto) {
                            $found = false;
                            if (isset($_SESSION["carrito"])) {
                                foreach ($_SESSION["carrito"] as $c) {
                                    if ($c["id_producto"] == $producto['id_producto']) {
                                        $found = true;
                                        break;
                                    }
                                }
                            }
                        ?>
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card h-100">
                                    <!-- <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="#"><?php echo $producto['nombre'] ?></a>
                                        </h4>
                                        <h5>$ <?php echo $producto['precio_unitario'] ?></h5>
                                        <p class="card-text"><?php echo $producto['descripcion'] ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="">
                                            <!-- d-flex justify-content-between -->
                                            <small class="text-warning d-none">
                                                <?php for ($i = 1; $i <= $producto['estrellas']; $i++) { ?>
                                                    &#9733;
                                                <?php } ?>
                                            </small>
                                            <?php if (!$found) : ?>
                                                <form class="form-inline" method="post" action="logica/agregar_carrito.php">
                                                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
                                                    <div class="form-group">
                                                        <input type="number" name="cant" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary btn-sm ml-2"><i class="fas fa-cart-plus"></i></button>
                                                </form>
                                            <?php else : ?>
                                                <a href="logica/eliminar_carrito.php?id_producto=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    <?php } else { ?>
                        <div class="alert alert-warning" role="alert">
                            Ningún producto disponible, seleccione otra tienda por favor.
                        </div>
                    <?php } ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <?php include('include/footer_inicio.php') ?>

</body>

</html>