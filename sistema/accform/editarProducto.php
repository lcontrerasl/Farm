<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'UPDATE usuario SET '
        . 'nombreUsuario=\'' . $_POST['nombreProducto'] . '\','
        . 'precio_refProducto=\'' . $_POST['precio_refProducto'] . '\','
        . 'stockProducto=\'' . $_POST['stockProducto'] . '\','
        . 'WHERE idProducto = ' . $_POST['idProducto'];
mysql_query($sql);
header("Location: http://localhost/farm/sistema/editarProducto.php?idProducto=" . $_POST['idProducto']);
die();
