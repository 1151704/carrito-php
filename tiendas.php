<?php
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
          <h1 class="h3 mb-4 text-gray-800">Tiendas</h1>

          <a href="registrar-tienda.php" class="btn btn-success btn-icon-split btn-sm mb-4">
            <span class="icon text-white-50">
              <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Registrar tienda</span>
          </a>

          <div class="row">

            <?php
            foreach ($tiendas as $tienda) {
            ?>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $tienda['total']; ?> productos registrados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $tienda['nombre']; ?></div>
                      </div>
                      <div class="col-auto">
                        <a href="logica/eliminar_tienda.php?id=<?php echo $tienda['id_tienda']; ?>" title="Eliminar tienda">
                          <i class="fas fa-trash text-danger"></i>
                        </a>
                        <a href="actualizar-tienda.php?id=<?php echo $tienda['id_tienda']; ?>" title="Actualizar tienda">
                          <i class="fas fa-edit text-warning"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>

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