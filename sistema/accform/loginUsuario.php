<?php

session_start();
echo $_POST['mailUsuario'];
echo $_POST['passUsuario'];
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM usuario WHERE mailUsuario = "' . $_POST['mailUsuario'] . '" AND passUsuario = "' . $_POST['passUsuario'] . '"';
mysql_query($sql);

$count = 0;
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    do {
        $usuario = Array(
            idUsuario => $row['idUsuario'],
            nombreUsuario => $row['nombreUsuario'],
            rutUsuario => $row['rutUsuario'],
            ap_paternoUsuario => $row['ap_paternoUsuario'],
            ap_maternoUsuario => $row['ap_maternoUsuario'],
            mailUsuario => $row['mailUsuario'],
            passUsuario => $row['passUsuario']
        );
        $count++;
    } while ($row = mysql_fetch_array($result));
}

if ($count == 0) {
    $_SESSION['error'] = 'error';
    header('Location: http://localhost/farm/sistema');
} else {
    $_SESSION['usuario'] = $usuario;
    header('Location: http://localhost/farm/sistema/inicio.php');
}
die();
