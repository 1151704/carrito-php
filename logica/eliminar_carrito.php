<?php
session_start();
if(!empty($_GET)){
	if(isset($_GET["id_producto"])){
		if(!empty($_SESSION["carrito"])){
			$carrito = $_SESSION["carrito"];
			$exist = false;
			$carrito_new = array();
			foreach ($carrito as $c) {
				if($c["id_producto"]==$_GET["id_producto"]){
					$exist = true;
				} else {
					array_push($carrito_new, $c);
				}
			}
			if(!$exist){
				print "<script>alert('Error: Producto no existente en carrito!');</script>";
			}else{
				$_SESSION["carrito"] = $carrito_new;
			}
        }
    	header("Location: ../carrito.php");
	}
}

?>

