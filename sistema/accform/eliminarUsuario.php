<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'DELETE FROM usuario WHERE idUsuario = ' . $_GET['idUsuario'];
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoUsuarios.php');
die();

