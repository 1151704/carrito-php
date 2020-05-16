<?php
include 'producto.model.php';

$nombre = null;
$descripcion = null;
$id_tienda = null;
$precio = null;

if(isset($_POST['id_tienda'])) {$id_tienda = $_POST['id_tienda'];}
if(isset($_POST['descripcion'])) {$descripcion = $_POST['descripcion'];}
if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
if(isset($_POST['precio'])) {$precio = $_POST['precio'];}

if (!insert_producto($nombre, $descripcion, $precio, $id_tienda)) {
    // mostrar mensaje de no realización
}
header("Location: ../productos.php");


?>