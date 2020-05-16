<?php
include 'tienda.model.php';

$nombre = null;
$nit = null;
$id = null;

if(isset($_POST['nit'])) {$nit = $_POST['nit'];}
if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
if(isset($_POST['id'])) {$id = $_POST['id'];}

if (!update_tienda($id, $nombre, $nit)) {
    // mostrar mensaje de no realización
}
header("Location: ../tiendas.php");


?>