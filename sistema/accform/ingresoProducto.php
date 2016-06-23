<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'INSERT INTO producto(nombreProducto, precio_refProducto, stockProducto ) VALUE(\'' . $_POST['nombreProducto'] . '\',\'' . $_POST['precio_refProducto'] . '\',\'' . $_POST['stockProducto'] . '\')';
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoProductos.php');
die();