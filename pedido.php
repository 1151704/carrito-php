<!DOCTYPE html>
<html lang="en">

<head>

  <?php include("include/head.php") ?>

</head>
<?php
if (isset($_GET['id_pedido'])) {
  $id_pedido = $_GET['id_pedido'];
}
include "logica/pedido.model.php";

$pedido = get_pedido_by_id($id_pedido);
$detalles = get_detalles_pedido_by_pedido($id_pedido);
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
          <h1 class="h3 mb-4 text-gray-800">Detalle del Pedido</h1>

          <a href="pedidos.php" class="btn btn-icon-split btn-sm mb-4">
              <span class="icon text-white-50">
                  <i class="fas fa-arrow-left"></i>
              </span>
              <span class="text">Volver</span>
          </a>

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