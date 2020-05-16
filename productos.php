<?php
include "logica/producto.model.php";

$productos = get_all_producto();
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

          <a href="registrar-producto.php" class="btn btn-success btn-icon-split btn-sm mb-4">
            <span class="icon text-white-50">
              <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Registrar producto</span>
          </a>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Listado de productos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tienda</th>
                      <th>Producto</th>
                      <th>Descripción</th>
                      <th>Precio unitario</th>
                      <th>Fecha registro</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($productos as $producto) {
                    ?>
                      <tr>
                        <td><?php echo $producto['tienda_nombre']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['precio_unitario']; ?></td>
                        <td><?php echo $producto['fecha_creacion']; ?></td>
                        <td>
                          <a href="logica/eliminar_producto.php?id=<?php echo $producto['id_producto']; ?>" title="Eliminar producto">
                            <i class="fas fa-trash text-danger"></i>
                          </a>
                          <a href="actualizar-producto.php?id=<?php echo $producto['id_producto']; ?>" title="Actualizar producto">
                            <i class="fas fa-edit text-warning"></i>
                          </a>
                        </td>
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