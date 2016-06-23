<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);
$sql = 'SELECT * FROM cliente ORDER BY idCliente DESC';
mysql_query($sql);

$result = mysql_query($sql);
$clientes = array();
if ($row = mysql_fetch_array($result)) {
    do {
        $clientes[] = $row;
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
                                Listado de Clientes
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3>Clientes</h3>
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
                                                        Dirección
                                                    </th>
                                                    <th>
                                                        Fono Fijo
                                                    </th>
                                                    <th>
                                                        Fono Movil
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
                                                for ($i = 0; $i < count($clientes); $i++) {
                                                    $clienteAux = $clientes[$i];
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['nombreCliente'] . ' ' . $clienteAux['ap_paternoCliente'] . ' ' . $clienteAux['ap_maternoCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['rutCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['direccionCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['fono_fijoCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['fono_movilCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            echo $clienteAux['mailCliente'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <a href="editarCliente.php?idCliente=<?= $clienteAux['idCliente']; ?>" class="btn btn-success">
                                                                Editar
                                                            </a>
                                                            <a href="accform/eliminarCliente.php?idCliente=<?= $clienteAux['idCliente']; ?>" onclick="return confirm('¿Está seguro de eliminar este registro?');" class="btn btn-danger">
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


