<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'UPDATE cliente SET '
        . 'nombreCliente=\'' . $_POST['nombreCliente'] . '\','       
        . 'ap_paternoCliente=\'' . $_POST['ap_paternoCliente'] . '\','
        . 'ap_maternoCliente=\'' . $_POST['ap_maternoCliente'] . '\','
         . 'rutCliente=\'' . $_POST['rutCliente'] . '\','
         . 'direccionCliente=\'' . $_POST['direccionCliente'] . '\','
         . 'fono_fijoCliente=\'' . $_POST['fono_fijoCliente'] . '\','
         . 'fono_movilCliente=\'' . $_POST['fono_movilCliente'] . '\','
        . 'mailCliente=\'' . $_POST['mailCliente'] . '\','
        . 'passCliente=\'' . $_POST['passCliente'] . '\' '
        . 'WHERE idCliente = ' . $_POST['idCliente'];
mysql_query($sql);
header("Location: http://localhost/farm/sistema/editarCliente.php?idCliente=" . $_POST['idCliente']);
die();
