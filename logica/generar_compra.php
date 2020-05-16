<?php

include 'cliente.model.php';
include 'pedido.model.php';
include 'producto.model.php';

session_start();

$nombre = null;
$email = null;
$telefono = null;
$direccion = null;
$total = 0;

if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
if(isset($_POST['email'])) {$email = $_POST['email'];}
if(isset($_POST['telefono'])) {$telefono = $_POST['telefono'];}
if(isset($_POST['total'])) {$total = $_POST['total'];}
if(isset($_POST['direccion'])) {$direccion = $_POST['direccion'];}


$id_cliente = insert_cliente($nombre, $telefono, $email);

if (isset($id_cliente)) {

    $id_pedido = insert_pedido($id_cliente, $direccion, $total);

    if (isset($id_pedido)) {
        foreach($_SESSION["carrito"] as $c) {

            $producto = get_producto_by_id($c['id_producto']);

            insert_pedido_detalle($id_pedido, $c['id_producto'], $producto['precio_unitario'], $c['cant']); 

        }

    }

}


?>