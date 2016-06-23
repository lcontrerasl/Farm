<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'UPDATE usuario SET '
        . 'nombreUsuario=\'' . $_POST['nombreUsuario'] . '\','       
        . 'ap_paternoUsuario=\'' . $_POST['ap_paternoUsuario'] . '\','
        . 'ap_maternoUsuario=\'' . $_POST['ap_maternoUsuario'] . '\','
         . 'rutUsuario=\'' . $_POST['rutUsuario'] . '\','
         . 'rutUsuario=\'' . $_POST['direccionCliente'] . '\','
         . 'rutUsuario=\'' . $_POST['fono_fijoCliente'] . '\','
         . 'rutUsuario=\'' . $_POST['fono_movilCliente'] . '\','
        . 'mailUsuario=\'' . $_POST['mailUsuario'] . '\','
        . 'passUsuario=\'' . $_POST['passUsuario'] . '\' '
        . 'WHERE idUsuario = ' . $_POST['idUsuario'];
mysql_query($sql);
header("Location: http://localhost/farm/sistema/editarCliente.php?idUsuario=" . $_POST['idUsuario']);
die();
