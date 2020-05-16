<?php
include 'usuario.model.php';

$username = null;
$password = null;
$nombre = null;
$telefono = null;
$email = null;

if(isset($_POST['username'])) {$username = $_POST['username'];}
if(isset($_POST['password'])) {$password = $_POST['password'];}
if(isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
if(isset($_POST['email'])) {$email = $_POST['email'];}
if(isset($_POST['telefono'])) {$telefono = $_POST['telefono'];}

if (insert_usuario($username, $password, $nombre, $telefono, $email)) {
    header("Location: ../login.php?msg=Registro exitoso");
} else {
    header("Location: ../registro.php?msg=No se logró registrar el usuario");
}


?>