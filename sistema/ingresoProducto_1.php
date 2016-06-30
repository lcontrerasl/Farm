<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Formulario de ingreso de usuarios
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/ingresoProducto.php" method="POST">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreProducto" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <input class="form-control" type="text" name="precio_refProducto" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Stock</label>
                                                <input class="form-control" type="text" name="stockProducto" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Tipo</label>
                                                <select class="form-control" name="tipo_producto_idTipo_producto" required="">
                                                    <?php
                                                    for ($i = 0; $i < count($tipo_productos); $i++) {
                                                        $tipo_productoAux = $tipo_productos[$i];
                                                        ?>
                                                        <option value="<?= $tipo_productoAux['idTipo_producto'] ?>">
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
                                                        ?>
                                                        <option value="<?= $unidadAux['idUnidad'] ?>">
                                                            <?= $unidadAux['nombreUnidad'] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-default">Guardar</button>
                                            <button type="reset" class="btn btn-default">Limpiar</button>
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
