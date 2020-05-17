<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["id_producto"]) && isset($_POST["cant"])){
		// si es el primer producto simplemente lo agregamos
		if(empty($_SESSION["carrito"])){
			$_SESSION["carrito"]=array( array("id_producto"=>$_POST["id_producto"],"cant"=> $_POST["cant"]));
		}else{
			// apartie del segundo producto:
			$carrito = $_SESSION["carrito"];
			$repeated = false;
			// recorremos el carrito en busqueda de producto repetido
			foreach ($carrito as $c) {
				// si el producto esta repetido rompemos el ciclo
				if($c["id_producto"]==$_POST["id_producto"]){
					$repeated=true;
					break;
				}
			}
			// si el producto es repetido no hacemos nada, simplemente redirigimos
			if($repeated){
				print "<script>alert('Error: Producto Repetido!');</script>";
			}else{
				// si el producto no esta repetido entonces lo agregamos a la variable carrito y despues asignamos la variable carrito a la variable de sesion
				array_push($carrito, array("id_producto"=>$_POST["id_producto"],"cant"=> $_POST["cant"]));
				$_SESSION["carrito"] = $carrito;
			}
        }
        header("Location: ../index.php");
	}
}

?>

