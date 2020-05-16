<?php
include_once 'database.php';

function get_tienda_by_id($id) {
    $sql = "select * from tienda where id_tienda = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch();
} 

function get_all_tienda() {
    
    $sql = "select t.*, count(p.id_producto) as total from tienda t left outer join producto p on p.id_tienda = t.id_tienda group by t.id_tienda";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

} 

function insert_tienda($nombre, $nit) {
    $sql = "insert into tienda (nombre, nit) values (?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $nit);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function update_tienda($id, $nombre, $nit) {
    $sql = "update tienda set nombre=?, nit=? where id_tienda = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $nit);
    $stmt->bindParam(3, $id);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function delete_tienda($id) {
    $sql = "delete from tienda where id_tienda = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

