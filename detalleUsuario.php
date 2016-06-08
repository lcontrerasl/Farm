<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM usuario WHERE idUsuario = ' . $_GET['id'];
mysql_query($sql);

$result = mysql_query($sql);
$usuario = Array(
    'idUsuario' => '',
    'nombreUsuario' => '',
    'rutUsuario' => '',
    'ap_paternoUsuario' => '',
    'ap_maternoUsuario' => '',
    'mailUsuario' => '',
    'passUsuario' => ''
);
if ($row = mysql_fetch_array($result)) {
    do {
        $usuario['idUsuario'] = $row['idUsuario'];
        $usuario['nombreUsuario'] = $row['nombreUsuario'];
        $usuario['rutUsuario'] = $row['rutUsuario'];
        $usuario['ap_paternoUsuario'] = $row['ap_paternoUsuario'];
        $usuario['ap_maternoUsuario'] = $row['ap_maternoUsuario'];
        $usuario['mailUsuario'] = $row['mailUsuario'];
        $usuario['passUsuario'] = $row['passUsuario'];
    } while ($row = mysql_fetch_array($result));
}
?>
<html>
    <body>
        <form action="accform/editarUsuario.php" method="POST">
            <label>NOMBRE</label>                
            <input value="<?= $usuario['nombreUsuario']; ?>" type="text" name="nombreUsuario" id="nombreUsuario"> 
            <br>
            <label>RUT</label>                
            <input value="<?= $usuario['rutUsuario']; ?>" type="text" name="rutUsuario" id="rutUsuario">
            <br>
            <label>APELLIDO PATERNO</label>                
            <input value="<?= $usuario['ap_paternoUsuario']; ?>" type="text" name="ap_paternoUsuario" id="ap_paternoUsuario">
            <br>
            <label>APELLIDO MATERNO</label>                
            <input value="<?= $usuario['ap_maternoUsuario']; ?>" type="text" name="ap_maternoUsuario" id="ap_maternoUsuario">
            <br>
            <label>MAIL</label>                
            <input value="<?= $usuario['mailUsuario']; ?>" type="email" name="mailUsuario" id="mailUsuario">
            <br>
            <label>PASSWORD</label>                
            <input value="<?= $usuario['passUsuario']; ?>" type="password" name="passUsuario" id="passUsuario">
            <br>

            <input value="<?= $usuario['idUsuario']; ?>" type="hidden" name="idUsuario" id="idUsuario">                      
            <br>
            <input type="submit" value="Guardar">
            <br>
        </form>
    </body>
</html>
