<?php

session_start();
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);

$sql = 'SELECT * FROM cliente WHERE rutCliente = \'' . $_POST['rutCliente'] . '\' ORDER BY idCliente DESC LIMIT 1';
$result = mysql_query($sql);
$clienteAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $clienteAux = $row;
    } while ($row = mysql_fetch_array($result));
}

if ($clienteAux['idCliente'] == null) {
    $sql = 'INSERT INTO cliente('
            . ' rutCliente'
            . ' ) '
            . 'VALUE('
            . '\'' . $_POST['rutCliente'] . '\''
            . ')';
    mysql_query($sql);
    $sql = 'SELECT * FROM cliente WHERE rutCliente = \'' . $_POST['rutCliente'] . '\' ORDER BY idCliente DESC LIMIT 1';
    mysql_query($sql);

    $result = mysql_query($sql);
    $clienteAux;
    if ($row = mysql_fetch_array($result)) {
        do {
            $clienteAux = $row;
        } while ($row = mysql_fetch_array($result));
    }
}

$sql = 'INSERT INTO pedido('
        . ' fechaPedido,'
        . ' cliente_idCliente,'
        . ' usuario_idUsuario'
        . ' ) '
        . 'VALUE('
        . '\'' . date("Y-m-d") . '\','
        . '\'' . $clienteAux['idCliente'] . '\','
        . '\'1\''
        . ')';
mysql_query($sql);

$sql = 'SELECT * FROM pedido ORDER BY idPedido DESC LIMIT 1';
mysql_query($sql);

$result = mysql_query($sql);
$pedidoAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $pedidoAux = $row;
    } while ($row = mysql_fetch_array($result));
}

if (isset($_SESSION['detalle_pedidos'])) {
    $detalle_pedidosAux = $_SESSION['detalle_pedidos'];
    for ($i = 0; $i < count($detalle_pedidosAux); $i++) {
        $detalle_pedidoAux = $detalle_pedidosAux[$i];
        $sql = 'INSERT INTO detalle_pedido('
                . ' cantidadDetalle_pedido,'
                . ' precio_actualDetalle_pedido,'
                . ' pedido_idPedido,'
                . ' producto_idProducto'
                . ' ) '
                . 'VALUE('
                . '\'' . $detalle_pedidoAux['cantidadDetalle_pedido'] . '\','
                . '\'' . $detalle_pedidoAux['precio_actualDetalle_pedido'] . '\','
                . '\'' . $pedidoAux['idPedido'] . '\','
                . '\'' . $detalle_pedidoAux['producto_idProducto'] . '\''
                . ')';
        mysql_query($sql);
    }
    session_destroy();
    header('Location: http://localhost/farm/productos.php');
} else {
    header('Location: http://localhost/farm/productos.php');
}

