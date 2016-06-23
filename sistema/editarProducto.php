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
                            <h1 class="page-header">Edición de Productos</h1>
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
                                Formulario edición de Productos
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
                                            <input type="hidden" name="idProducto" value="<?= $productoAux['idProducto']; ?>">
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


