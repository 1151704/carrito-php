<?php
include 'producto.model.php';

$nombre = null;
$descripcion = null;
$precio = null;
$id = null;

if(isset($_POST['descripcion'])) {$descripcion = $_POST['descripcion'];}
if(isset($_POST['precio'])) {$precio = $_POST['precio'];}
if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
if(isset($_POST['id'])) {$id = $_POST['id'];}

if (!update_producto($id, $nombre, $descripcion, $precio)) {
    // mostrar mensaje de no realización
}
header("Location: ../productos.php");


?>