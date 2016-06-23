<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM usuario ORDER BY idUsuario DESC';
mysql_query($sql);

$result = mysql_query($sql);
$usuarios = array();
if ($row = mysql_fetch_array($result)) {
    do {
        $usuarios[] = $row;
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
                                Listado de Usuarios
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Usuarios</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Nombre
                                                    </th>
                                                    <th>
                                                        Rut
                                                    </th>
                                                    <th>
                                                        Correo Electrónico
                                                    </th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                for ($i = 0; $i < count($usuarios); $i++) {
                                                    $usuarioAux = $usuarios[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $usuarioAux['nombreUsuario'] . ' ' . $usuarioAux['ap_paternoUsuario'] . ' ' . $usuarioAux['ap_maternoUsuario'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $usuarioAux['rutUsuario'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $usuarioAux['mailUsuario'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="editarUsuario.php?idUsuario=<?= $usuarioAux['idUsuario']; ?>" class="btn btn-success">
                                                                Editar
                                                            </a>
                                                            <a href="accform/eliminarUsuario.php?idUsuario=<?= $usuarioAux['idUsuario']; ?>" onclick="return confirm('¿Está seguro de eliminar este registro?');" class="btn btn-danger">
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
