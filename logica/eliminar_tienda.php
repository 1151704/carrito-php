<?php
include 'tienda.model.php';

$id = null;

if(isset($_GET['id'])) {$id = $_GET['id'];}

if (!delete_tienda($id)) {
    // mostrar mensaje de no realización
}
header("Location: ../tiendas.php");


?>