<?php
session_start();
include "logica/producto.model.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Tiendas</h1>
			<a href="index.php" class="btn btn-warning">Volver a tiendas</a>
			<br><br>
<?php
//$productos = $con->query("select * from producto");
if(isset($_SESSION["carrito"]) && !empty($_SESSION["carrito"])):
?>
<table class="table table-bordered">
<thead>
	<th>Producto</th>
	<th>Cantidad</th>
	<th>Precio unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
$valor_total = 0;
$cant_total = 0;
foreach($_SESSION["carrito"] as $c):
    $producto = get_producto_by_id($c['id_producto']);
    $valor_total += $producto['precio_unitario']*$c['cant'];
    $cant_total += $c['cant'];
?>
<tr>
	<td><?php echo $producto['nombre'];?></td>
  <td>$ <?php echo $producto['precio_unitario']; ?></td>
  <td><?php echo $c["cant"];?></td>
	<td>$ <?php echo $c["cant"]*$producto['precio_unitario']; ?></td>
	<td style="width:260px;">
		<a href="logica/eliminar_carrito.php?id_producto=<?php echo $producto['id_producto']; ?>" 
			class="btn btn-danger btn-sm">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
<tr>
  <td></td>
  <td></td>
  <td><?php echo $cant_total ?></td>
  <td>$ <?php echo $valor_total ?></td>
  <td></td>
</tr>
</table>

<form class="form-horizontal" method="post" action="logica/generar_compra.php">
  <input type="hidden" name="total" value="<?php echo $valor_total ?>" >
  <div class="form-group">
    <label for="inputNombre" class="col-sm-2 control-label">Nombre del cliente</label>
    <div class="col-sm-5">
      <input type="text" name="nombre" required class="form-control" id="inputNombre" 
      placeholder="Nombre del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail" class="col-sm-2 control-label">Email del cliente</label>
    <div class="col-sm-5">
      <input type="email" name="email" required class="form-control" id="inputEmail" 
      placeholder="Email del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputTel" class="col-sm-2 control-label">Teléfono del cliente</label>
    <div class="col-sm-5">
      <input type="text" name="telefono" required class="form-control" id="inputTel" 
      placeholder="Teléfono del cliente">
    </div>
  </div>
  <div class="form-group">
    <label for="inputDir" class="col-sm-2 control-label">Dirección de entrega</label>
    <div class="col-sm-5">
      <input type="text" name="direccion" required class="form-control" id="inputDir" 
      placeholder="Direcció del cliente">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Procesar Venta</button>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>
<br><br><hr>
<p>Powered by <a href="http://domicilios.com/" target="_blank">Domicilios.com</a></p>

		</div>
	</div>
</div>
</body>
</html>