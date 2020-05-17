<?php
session_start();
if(!empty($_POST)){
	if(isset($_POST["id_producto"]) && isset($_POST["cant"])){
		$carrito_new = array();
		$carrito = $_SESSION["carrito"];
		foreach ($carrito as $c) {
			if($c["id_producto"]==$_POST["id_producto"]){
				$nuevo = array("id_producto"=>$_POST["id_producto"],"cant"=> $_POST["cant"]);
				array_push($carrito_new, $nuevo);
			} else {
				array_push($carrito_new, $c);
			}
		}
		$_SESSION["carrito"] = $carrito_new;
	
        header("Location: ../carro.php");
	}
}
