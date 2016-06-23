<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'DELETE FROM producto WHERE idProducto = ' . $_GET['idProducto'];
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoProductos.php');
die();
