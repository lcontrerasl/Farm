<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM cliente WHERE idCliente = ' . $_GET['idCliente'];
mysql_query($sql);

$result = mysql_query($sql);
$clienteAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $clienteAux = $row;
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
                                Formulario de edición de clientes
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/editarCliente.php" method="POST">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreCliente" required="" value="<?= $clienteAux['nombreCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input class="form-control" type="text" name="ap_paternoCliente" required="" value="<?= $clienteAux['ap_paternoCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input class="form-control" type="text" name="ap_maternoCliente" required="" value="<?= $clienteAux['ap_maternoCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Rut</label>
                                                <input class="form-control" type="text" name="rutCliente" required="" value="<?= $clienteAux['rutCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Dirección Cliente</label>
                                                <input class="form-control" type="text" name="direccionCliente" required="" value="<?= $clienteAux['direccionCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Fono Fijo</label>
                                                <input class="form-control" type="text" name="fono_fijoCliente" required="" value="<?= $clienteAux['fono_fijoCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Fono Movil</label>
                                                <input class="form-control" type="text" name="fono_movilCliente" required="" value="<?= $clienteAux['fono_movilCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="mailCliente" required="" value="<?= $clienteAux['mailCliente']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="passCliente" required="" value="<?= $clienteAux['passCliente']; ?>">
                                            </div>
                                            <input type="hidden" name="idCliente" value="<?= $clienteAux['idCliente']; ?>">
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


