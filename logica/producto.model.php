<?php
include_once 'database.php';

function get_producto_by_id($id) {
    $sql = "select * from producto where id_producto = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    return $stmt->fetch();
} 

function get_all_producto_by_tienda($id_tienda) {
    
    $sql = "select * from producto where id_tienda = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id_tienda);
    $stmt->execute();
    return $stmt->fetchAll();

} 

function get_all_producto() {
    
    $sql = "select p.*, t.nombre as tienda_nombre from producto p join tienda t on t.id_tienda = p.id_tienda order by p.id_tienda, p.nombre";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

} 

function insert_producto($nombre, $descripcion, $precio, $id_tienda) {
    $sql = "insert into producto (nombre, descripcion, precio_unitario, id_tienda) values (?,?,?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $descripcion);
    $stmt->bindParam(3, $precio);
    $stmt->bindParam(4, $id_tienda);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function update_producto($id, $nombre, $descripcion, $precio) {
    $sql = "update producto set nombre=?, descripcion=?, precio_unitario=? where id_producto = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $descripcion);
    $stmt->bindParam(3, $precio);
    $stmt->bindParam(4, $id);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function delete_producto($id) {
    $sql = "delete from producto where id_producto = ?";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}
