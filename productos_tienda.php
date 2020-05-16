<?php
$id_tienda = null;

session_start();
if(!empty($_SESSION["id_tienda"]) && !isset($_GET['id_tienda'])) {
	$id_tienda = $_SESSION["id_tienda"];
} else {
	if(isset($_GET['id_tienda'])) {$id_tienda = $_GET['id_tienda'];}
}
include "logica/producto.model.php";

$_SESSION["id_tienda"] = $id_tienda;
$productos = get_all_producto_by_tienda($id_tienda);

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
			<h1>Productos</h1>
			<a href="index.php" class="btn btn-warning">Volver a tiendas</a>
			<br><br>

<table class="table table-bordered">
<thead>
	<th>Producto</th>
	<th>Valor unitario</th>
	<th>Id</th>
</thead>
<?php 
foreach ($productos as $producto) {
?>
<tr>
	<td><?php echo $producto['nombre'];?></td>
	<td><?php echo $producto['precio_unitario']; ?></td>
	<td style="width:260px;">
		<?php
		$found = false;

		if(isset($_SESSION["carrito"])){ foreach ($_SESSION["carrito"] as $c) { if($c["id_producto"]==$producto['id_producto']){ $found=true; break; }}}
		
		?>
		<?php if($found):?>
			<a href="logica/eliminar_carrito.php?id_producto=<?php echo $producto['id_producto']; ?>" 
			class="btn btn-danger btn-sm">Eliminar</a>
		<?php else:?>
		<form class="form-inline" method="post" action="logica/agregar_carrito.php">
		<input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
		<div class="form-group">
			<input type="number" name="cant" value="1" style="width:100px;" 
			min="1" class="form-control" placeholder="Cantidad">
		</div>
		<button type="submit" class="btn btn-primary btn-sm">Agregar al carrito</button>
		</form>	
		<?php endif; ?>
	</td>
</tr>
<?php
}
?>
</table>
<br><br><hr>
<p>Powered by <a href="http://evilnapsis.com/" target="_blank">Evilnapsis</a></p>

		</div>
	</div>
</div>
</body>
</html>