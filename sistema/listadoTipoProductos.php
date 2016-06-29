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
                            <h1 class="page-header">
                                Listado de Productos
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Productos</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Nombre
                                                    </th>

                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($tipo_productos); $i++) {
                                                    $tipo_productoAux = $tipo_productos[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $tipo_productoAux['nombreTipo_producto'];
                                                            ?>
                                                        </td>                                                        
                                                        <td>
                                                            <a href="editarTipoProducto.php?idTipo_producto=<?= $tipo_productoAux['idTipo_producto']; ?>" class="btn btn-success">
                                                                Editar
                                                            </a>
                                                            <a href="accform/eliminarTipoProducto.php?idTipo_producto=<?= $tipo_productoAux['idTipo_producto']; ?>" onclick="return confirm('¿Está seguro de eliminar este registro?');" class="btn btn-danger">
                                                                Eliminar
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>

        <?php
        include_once './componentes/librerias.php';
        ?>

    </body>

</html>
