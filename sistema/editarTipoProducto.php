<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM tipo_producto WHERE idTipo_producto = ' . $_GET['idTipo_producto'];
mysql_query($sql);

$result = mysql_query($sql);
$tipo_productoAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $tipo_productoAux = $row;
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
                            <h1 class="page-header">Edición Cliente</h1>
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
                                Formulario de Tipo Productos
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/editarTipoProducto.php" method="POST">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreTipo_producto" required="" value="<?= $tipo_productoAux['nombreTipo_producto']; ?>">
                                            </div>                                            
                                            <input type="hidden" name="idTipo_producto" value="<?= $tipo_productoAux['idTipo_producto']; ?>">
                                            <button type="submit" class="btn btn-warning">Editar</button>
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