<?php
include 'tienda.model.php';

$nombre = null;
$nit = null;

if(isset($_POST['nit'])) {$nit = $_POST['nit'];}
if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}

if (!insert_tienda($nombre, $nit)) {
    // mostrar mensaje de no realización
}
header("Location: ../tiendas.php");


?>