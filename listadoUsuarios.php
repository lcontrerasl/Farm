<?php

//echo $_POST['nombreUsuario'];
//echo $_POST['rutUsuario'];
//echo $_POST['ap_paternoUsuario'];
//echo $_POST['ap_maternoUsuario'];
//echo $_POST['mailUsuario'];
//echo $_POST['passUsuario'];
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM usuario';
mysql_query($sql);

$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    echo '<table border = "0" width="100%">';
    echo '<tr>';
    echo '<td><strong>NOMBRE</strong></td>';
    echo '<td><strong>RUT</strong></td>';
    echo '<td><strong>APELLIDO PATERNO</strong></td>';
    echo '<td><strong>APELLIDO MATERNO</strong></td>';
    echo '<td><strong>MAIL</strong></td>';
    echo '<td><strong>PASSWORD</strong></td>';
    echo '<td></td>';
    echo '</tr>';
    do {
        echo '<tr>';
        echo '<td>' . $row['nombreUsuario'] . '</td>';
        echo '<td>' . $row['rutUsuario'] . '</td>';
        echo '<td>' . $row['ap_paternoUsuario'] . '</td>';
        echo '<td>' . $row['ap_maternoUsuario'] . '</td>';
        echo '<td>' . $row['mailUsuario'] . '</td>';
        echo '<td>' . $row['passUsuario'] . '</td>';
        echo '<td><a href="detalleUsuario.php?id='.$row['idUsuario'].'">Editar</a></td>';        
        echo '</tr>';        
    } while ($row = mysql_fetch_array($result));
    echo '</table>';
} else {
    echo "No existen Usuarios";
}

