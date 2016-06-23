<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'INSERT INTO cliente(nombreCliente, ap_paternoCliente, ap_maternoCliente, rutCliente, direccionCliente, fono_fijoCliente, fono_movilCliente, mailCliente, passCliente) VALUE(\'' . $_POST['nombreCliente'] . '\',\'' . $_POST['ap_paternoCliente'] . '\',\'' . $_POST['ap_maternoCliente'] . '\',\'' . $_POST['rutCliente'] . '\',\'' . $_POST['direccionCliente'] . '\',\'' . $_POST['fono_fijoCliente'] . '\',\'' . $_POST['fono_movilCliente'] . '\',\'' . $_POST['mailCliente'] . '\',\'' . $_POST['passCliente'] . '\')';
mysql_query($sql);
header('Location: http://localhost/farm/sistema/listadoClientes.php');
die();


