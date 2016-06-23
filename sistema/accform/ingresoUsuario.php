<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'INSERT INTO usuario(nombreUsuario, rutUsuario, ap_paternoUsuario, ap_maternoUsuario, mailUsuario, passUsuario) VALUE(\'' . $_POST['nombreUsuario'] . '\',\'' . $_POST['rutUsuario'] . '\',\'' . $_POST['ap_paternoUsuario'] . '\',\'' . $_POST['ap_maternoUsuario'] . '\',\'' . $_POST['mailUsuario'] . '\',\'' . $_POST['passUsuario'] . '\')';
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoUsuarios.php');
die();
