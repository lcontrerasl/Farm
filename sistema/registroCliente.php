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
                            <h1 class="page-header">Registro Cliente</h1>
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
                                Formulario de ingreso de Clientes
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" action="accform/registroCliente.php" method="POST">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input class="form-control" type="text" name="nombreCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Paterno</label>
                                                <input class="form-control" type="text" name="ap_paternoCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Apellido Materno</label>
                                                <input class="form-control" type="text" name="ap_maternoCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Rut</label>
                                                <input class="form-control" type="text" name="rutCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Direccion</label>
                                                <input class="form-control" type="text" name="direccionCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Fono Fijo</label>
                                                <input class="form-control" type="text" name="fono_fijoCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Fono Movil</label>
                                                <input class="form-control" type="text" name="fono_movilCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="email" name="mailCliente" required="">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="form-control" type="password" name="passCliente" required="">
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




