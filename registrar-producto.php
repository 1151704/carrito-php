<?php
session_start();
include "logica/tienda.model.php";
$tiendas = get_all_tienda();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("include/head.php") ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("include/menu.php") ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("include/topbar.php") ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Productos</h1>

                    <a href="productos.php" class="btn btn-icon-split btn-sm mb-4">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Volver</span>
                    </a>

                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Formulario registro de nuevo producto
                                </div>
                                <div class="card-body">
                                    <form method="post" action="logica/registrar_producto.php">
                                        <div class="form-group">
                                            <label for="inputTienda">Tienda</label>
                                            <select name="id_tienda" class="form-control" id="inputTienda" >
                                                <?php 
                                                foreach ($tiendas as $tienda) {
                                                ?>
                                                <option value="<?php echo $tienda['id_tienda']; ?>"><?php echo $tienda['nombre']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id="inputNombre" >
                                        </div>
                                        <div class="form-group">
                                            <label for="inputDesc">Descripción</label>
                                            <input type="text" name="descripcion" class="form-control" id="inputDesc" >
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPrecio">Precio unitario</label>
                                            <input type="number" min="1" class="form-control" id="inputPrecio" 
                                                name="precio">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registar</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include("include/footer.php") ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <?php include("include/scripts.php") ?>

</body>

</html>