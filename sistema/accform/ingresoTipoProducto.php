<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'INSERT INTO tipo_producto(nombreTipo_producto ) VALUE(\'' . $_POST['nombreTipo_producto'] . '\')';
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoTipoProductos.php');
die();