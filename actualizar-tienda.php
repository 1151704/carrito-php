<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("include/head.php") ?>

</head>
<?php
include "logica/tienda.model.php";
$id = null;

if(isset($_GET['id'])) {$id = $_GET['id'];}

$tienda = get_tienda_by_id($id);

?>
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
                    <h1 class="h3 mb-4 text-gray-800">Tiendas</h1>

                    <a href="tiendas.php" class="btn btn-icon-split btn-sm mb-4">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Volver</span>
                    </a>

                    <div class="row">
                        <div class="col">
                            <div class="card mb-4">
                                <div class="card-header">
                                    Formulario actualización de tienda
                                </div>
                                <div class="card-body">
                                    <form method="post" action="logica/actualizar_tienda.php">
                                        <input type="hidden" name="id" value="<?php echo $tienda['id_tienda'] ?>">
                                        <div class="form-group">
                                            <label for="inputNombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" id="inputNombre" 
                                            value="<?php echo $tienda['nombre'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputNit">Nit</label>
                                            <input type="text" class="form-control" id="inputNit" 
                                                name="nit" value="<?php echo $tienda['nit'] ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
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