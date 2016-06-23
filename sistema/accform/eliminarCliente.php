<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'DELETE FROM cliente WHERE idCliente = ' . $_GET['idCliente'];
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoClientes.php');
die();

