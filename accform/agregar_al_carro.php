<?php

session_start();
if (isset($_SESSION['detalle_pedidos'])) {
    $detalle_pedidosAux = $_SESSION['detalle_pedidos'];
    $detalle_pedido = array(
        "cantidadDetalle_pedido" => $_POST['cantidadDetalle_pedido'],
        "precio_actualDetalle_pedido" => $_POST['precio_actualDetalle_pedido'],
        "producto_idProducto" => $_POST['producto_idProducto']
    );
    $detalle_pedidosAux[] = $detalle_pedido;
    $_SESSION['detalle_pedidos'] = $detalle_pedidosAux;
} else {
    $detalle_pedido = array(
        "cantidadDetalle_pedido" => $_POST['cantidadDetalle_pedido'],
        "precio_actualDetalle_pedido" => $_POST['precio_actualDetalle_pedido'],
        "producto_idProducto" => $_POST['producto_idProducto']
    );
    $detalle_pedidos = array();
    $detalle_pedidos[] = $detalle_pedido;
    $_SESSION['detalle_pedidos'] = $detalle_pedidos;
}
var_dump($_SESSION['detalle_pedidos']);
header('Location: http://localhost/farm/productos.php');

