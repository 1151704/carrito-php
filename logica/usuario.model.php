<?php
include_once 'database.php';

function get_usuario_by_id($id) {
    $sql = "select * from usuario where id_usuario = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetchAll();
} 

function get_usuario_by_username_and_password($username, $password) {
    $sql = "select * from usuario where username = ? and password = ? limit 1";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->execute();
    return $stmt->fetch();

} 

function insert_usuario($username, $password, $nombre, $telefono, $correo_electronico) {
    $sql = "insert into usuario (username, password, nombre, telefono, correo_electronico) values (?,?,?,?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->bindParam(3, $nombre);
    $stmt->bindParam(4, $telefono);
    $stmt->bindParam(5, $correo_electronico);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

