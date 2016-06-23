<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'UPDATE usuario SET '
        . 'nombreUsuario=\'' . $_POST['nombreUsuario'] . '\','
        . 'rutUsuario=\'' . $_POST['rutUsuario'] . '\','
        . 'ap_paternoUsuario=\'' . $_POST['ap_paternoUsuario'] . '\','
        . 'ap_maternoUsuario=\'' . $_POST['ap_maternoUsuario'] . '\','
        . 'mailUsuario=\'' . $_POST['mailUsuario'] . '\','
        . 'passUsuario=\'' . $_POST['passUsuario'] . '\' '
        . 'WHERE idUsuario = ' . $_POST['idUsuario'];
mysql_query($sql);
header("Location: http://localhost/farm/sistema/editarUsuario.php?idUsuario=" . $_POST['idUsuario']);
die();

