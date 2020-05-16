<?php
include_once 'database.php';

function insert_cliente($nombre, $telefono, $correo_electronico) {
    $sql = "insert into cliente (nombre, telefono, correo_electronico) values (?,?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $telefono);
    $stmt->bindParam(3, $correo_electronico);
    if ($stmt->execute() == 1) {
        return $db_conn->lastInsertId();
    } else {
        return null;
    }

} 