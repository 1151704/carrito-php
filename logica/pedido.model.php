<?php
include_once 'database.php';

function insert_pedido($id_cliente, $direccion, $valor_total) {
    $sql = "insert into pedido (id_cliente, direccion, valor_total) values (?,?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id_cliente);
    $stmt->bindParam(2, $direccion);
    $stmt->bindParam(3, $valor_total);
    if ($stmt->execute() == 1) {
        return $db_conn->lastInsertId();
    } else {
        return null;
    }
}

function insert_pedido_detalle($id_pedido, $id_producto, $valor_unitario, $cantidad) {
    $sql = "insert into pedido_detalle (id_pedido, id_producto, valor_unitario, cantidad) values (?,?,?,?)";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->bindParam(1, $id_pedido);
    $stmt->bindParam(2, $id_producto);
    $stmt->bindParam(3, $valor_unitario);
    $stmt->bindParam(4, $cantidad);
    if ($stmt->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function get_all_pedidos() {
    
    $sql = "select p.*, c.nombre as nombre_cliente, c.telefono as telefono_cliente from pedido p join cliente c on c.id_cliente = p.id_cliente order by p.fecha_creacion desc";

    $db_conn = Database::StartUp();

    $stmt = $db_conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();

} 