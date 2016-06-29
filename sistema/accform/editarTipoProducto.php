<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'UPDATE tipo_producto SET '
        . 'nombreTipo_producto=\'' . $_POST['nombreTipo_producto'] . '\' '
        . 'WHERE idTipo_producto = ' . $_POST['idTipo_producto'];
mysql_query($sql);
header("Location: http://localhost/farm/sistema/editarTipoProducto.php?idTipo_producto=" . $_POST['idTipo_producto']);
die();
