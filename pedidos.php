<?php
session_start();
include "logica/pedido.model.php";

$pedidos = get_all_pedidos();
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
          <h1 class="h3 mb-4 text-gray-800">Pedidos</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de pedidos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre cliente</th>
                      <th>Teléfono cliente</th>
                      <th>Dirección pedido</th>
                      <th>Precio total</th>
                      <th>Fecha registro</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($pedidos as $pedido) {
                    ?>
                      <tr>
                        <td><?php echo $pedido['nombre_cliente']; ?></td>
                        <td><?php echo $pedido['telefono_cliente']; ?></td>
                        <td><?php echo $pedido['direccion']; ?></td>
                        <td><?php echo $pedido['valor_total']; ?></td>
                        <td><?php echo $pedido['fecha_creacion']; ?></td>
                        <td></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
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