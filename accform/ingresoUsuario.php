<?php

//echo $_POST['nombreUsuario'];
//echo $_POST['rutUsuario'];
//echo $_POST['ap_paternoUsuario'];
//echo $_POST['ap_maternoUsuario'];
//echo $_POST['mailUsuario'];
//echo $_POST['passUsuario'];
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql='INSERT INTO usuario(nombreUsuario, rutUsuario, ap_paternoUsuario, ap_maternoUsuario, mailUsuario, passUsuario) VALUE(\''.$_POST['nombreUsuario'].'\',\''.$_POST['rutUsuario'].'\',\''.$_POST['ap_paternoUsuario'].'\',\''.$_POST['ap_maternoUsuario'].'\',\''.$_POST['mailUsuario'].'\',\''.$_POST['passUsuario'].'\')';
mysql_query($sql);