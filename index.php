<?php
/*
* Este archio muestra los productos en una tabla.
*/
session_start();
include "logica/tienda.model.php";

$tiendas = get_all_tienda();

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
			<a href="carrito.php" class="btn btn-warning">Ver Carrito</a>
			<br><br>

<table class="table table-bordered">
<thead>
	<th>Tienda</th>
</thead>
<?php 
foreach ($tiendas as $tienda) {
?>
<tr>
	<td>
		<a href="productos_tienda.php?id_tienda=<?php echo $tienda['id_tienda'] ?>">
		<?php echo $tienda['nombre'];?>
		</a>
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