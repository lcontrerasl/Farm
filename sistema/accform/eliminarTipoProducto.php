<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'DELETE FROM tipo_producto WHERE idTipo_producto = ' . $_GET['idTipo_producto'];
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoTipoProductos.php');
die();
?>
