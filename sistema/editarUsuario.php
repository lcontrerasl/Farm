<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM usuario WHERE idUsuario = ' . $_GET['idUsuario'];
mysql_query($sql);

$result = mysql_query($sql);
$usuarioAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $usuarioAux = $row;
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
                            <h1 class="page-header">Edición Usuario</h1>
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
                                Formulario de edición de usuarios
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/editarUsuario.php" method="post">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreUsuario" required="" value="<?= $usuarioAux['nombreUsuario']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input class="form-control" type="text" name="ap_paternoUsuario" required="" value="<?= $usuarioAux['ap_paternoUsuario']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input class="form-control" type="text" name="ap_maternoUsuario" required="" value="<?= $usuarioAux['ap_maternoUsuario']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Rut</label>
                                                <input class="form-control" type="text" name="rutUsuario" required="" value="<?= $usuarioAux['rutUsuario']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="mailUsuario" required="" value="<?= $usuarioAux['mailUsuario']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="passUsuario" required="" value="<?= $usuarioAux['passUsuario']; ?>">
                                            </div>
                                            <input type="hidden" name="idUsuario" value="<?= $usuarioAux['idUsuario']; ?>">
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
