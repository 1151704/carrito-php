<?php
require 'usuario.model.php';

$username = null;
$password = null;

if(isset($_POST['username'])) {$username = $_POST['username'];}
if(isset($_POST['password'])) {$password = $_POST['password'];}


$result = get_usuario_by_username_and_password($username, $password);
if (isset($result)){
    $_SESSION["id_usuario"] = $result['id_usuario'];
    $_SESSION["nombre"] = $result['nombre'];

    header("Location: ../inicio.php");
} else {
    header("Location: ../login.php?msg=Datos invalidos");
}
