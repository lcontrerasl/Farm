<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM tipo producto ORDER BY idTipo_producto DESC';
mysql_query($sql);

$result = mysql_query($sql);
$productos = array();
if ($row = mysql_fetch_array($result)) {
    do {
        $productos[] = $row;
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
                                                        Precio
                                                    </th>
                                                    <th>
                                                        Stock
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($productos); $i++) {
                                                    $productoAux = $productos[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $productoAux['nombreProducto'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $productoAux['precio_refProducto'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $productoAux['stockProducto'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="editarProducto.php?idProducto=<?= $productoAux['idProducto']; ?>" class="btn btn-success">
                                                                Editar
                                                            </a>
                                                            <a href="accform/eliminarProducto.php?idProducto=<?= $productoAux['idProducto']; ?>" onclick="return confirm('¿Está seguro de eliminar este registro?');" class="btn btn-danger">
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
