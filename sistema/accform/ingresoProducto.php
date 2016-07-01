<?php

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'INSERT INTO producto('
        . ' nombreProducto,'
        . ' precio_refProducto,'
        . ' stockProducto,'
        . ' tipo_producto_idTipo_producto,'
        . ' unidad_idUnidad'
        . ' ) '
        . 'VALUE('
        . '\'' . $_POST['nombreProducto'] . '\','
        . '\'' . $_POST['precio_refProducto'] . '\','
        . '\'' . $_POST['stockProducto'] . '\','
        . '\'' . $_POST['tipo_producto_idTipo_producto'] . '\','
        . '\'' . $_POST['unidad_idUnidad'] . '\''
        . ')';
mysql_query($sql);

$sql = 'SELECT * FROM producto ORDER BY idProducto DESC LIMIT 1';
mysql_query($sql);

$result = mysql_query($sql);
$productoAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $productoAux = $row;
    } while ($row = mysql_fetch_array($result));
}


header('Location: http://localhost/farm/sistema/editarProducto.php?idProducto=' . $productoAux['idProducto']);
die();
