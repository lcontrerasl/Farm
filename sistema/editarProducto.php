<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);

$sql = 'SELECT * FROM producto WHERE idProducto = ' . $_GET['idProducto'];
mysql_query($sql);

$result = mysql_query($sql);
$productoAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $productoAux = $row;
    } while ($row = mysql_fetch_array($result));
}

$sql = 'SELECT * FROM tipo_producto ORDER BY idTipo_producto DESC';
mysql_query($sql);

$result = mysql_query($sql);
$tipo_productos = array();
if ($row = mysql_fetch_array($result)) {
    do {
        $tipo_productos[] = $row;
    } while ($row = mysql_fetch_array($result));
}

$sql = 'SELECT * FROM unidad ORDER BY idUnidad DESC';
mysql_query($sql);

$result = mysql_query($sql);
$unidades = array();
if ($row = mysql_fetch_array($result)) {
    do {
        $unidades[] = $row;
    } while ($row = mysql_fetch_array($result));
}
?>
<!DOCTYPE html>
<html lang="en">

    <?php
    include_once './componentes/head.php';
    ?>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php
            include_once './componentes/menu.php';
            ?>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Ingreso de Productos</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                <div class="row">
                    <?php
                    $col = 12;
                    if ($productoAux['imgProducto'] != null) {
                        $col = 6;
                    }
                    ?>
                    <div class="col-lg-<?= $col ?>">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Imagen del Producto
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form enctype="multipart/form-data" role="form" action="accform/uploader.php" method="POST">
                                            <div class="form-group">
                                                <label>Imagen. Tamaño ideal 290px 220px</label>
                                                <input class="form-control" type="file" name="uploadedfile">
                                            </div>
                                            <button type="submit" class="btn btn-warning">Subir</button>
                                            <input type="hidden" name="idProducto" value="<?= $productoAux['idProducto'] ?>">
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <?php
                    if ($productoAux['imgProducto'] != null) {
                        ?>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <img src="accform/uploads/<?= $productoAux['imgProducto'] ?>" width="290" height="220">
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.row (nested) -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <?php
                    }
                    ?>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Formulario de ingreso de usuarios
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/editarProducto.php" method="POST">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreProducto" required="" value="<?= $productoAux['nombreProducto']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <input class="form-control" type="text" name="precio_refProducto" required="" value="<?= $productoAux['precio_refProducto']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input class="form-control" type="text" name="stockProducto" required="" value="<?= $productoAux['stockProducto']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select class="form-control" name="tipo_producto_idTipo_producto" required="">
                                                    <?php
                                                    for ($i = 0; $i < count($tipo_productos); $i++) {
                                                        $tipo_productoAux = $tipo_productos[$i];
                                                        $selected = "";
                                                        if ($tipo_productoAux['idTipo_producto'] == $productoAux['tipo_producto_idTipo_producto']) {
                                                            $selected = 'selected';
                                                        }
                                                        ?>
                                                        <option value="<?= $tipo_productoAux['idTipo_producto'] ?>" <?= $selected ?>>
                                                            <?= $tipo_productoAux['nombreTipo_producto'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Unidad de Medida</label>
                                                <select class="form-control" name="unidad_idUnidad" required="">
                                                    <?php
                                                    for ($i = 0; $i < count($unidades); $i++) {
                                                        $unidadAux = $unidades[$i];
                                                        $selected = "";
                                                        if ($unidadAux['idUnidad'] == $productoAux['unidad_idUnidad']) {
                                                            $selected = 'selected';
                                                        }
                                                        ?>
                                                        <option value="<?= $unidadAux['idUnidad'] ?>" <?= $selected ?>>
                                                            <?= $unidadAux['nombreUnidad'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-warning">Editar</button>
                                            <input type="hidden" name="idProducto" value="<?= $productoAux['idProducto'] ?>">
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>

        <?php
        include_once './componentes/librerias.php';
        ?>

    </body>

</html>
