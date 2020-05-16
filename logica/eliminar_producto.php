<?php
include 'producto.model.php';

$id = null;

if(isset($_GET['id'])) {$id = $_GET['id'];}

if (!delete_producto($id)) {
    // mostrar mensaje de no realización
}
header("Location: ../productos.php");


?>