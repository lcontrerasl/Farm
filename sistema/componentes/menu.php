<?php
session_start();
$usuario;
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
} else {
    header('Location: http://localhost/farm/sistema');
}
?>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Sistema Farm</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i><?php echo $usuario['nombreUsuario'] . ' ' . $usuario['ap_paternoUsuario'] . ' '; ?><i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Mi Perfil</a>
                </li>
                <li><a href="http://localhost/farm/sistema"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>Usuarios<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="ingresoUsuario.php">Ingreso</a>
                        </li>
                        <li>
                            <a href="listadoUsuarios.php">Listado</a>
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>Clientes<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="registroCliente.php">Ingreso</a>
                        </li>
                        <li>
                            <a href="listadoClientes.php">Listado</a>
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-user fa-fw"></i>Productos<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="ingresoProducto.php">Ingreso</a>
                        </li>
                        <li>
                            <a href="listadoProductos.php">Listado</a>
                        </li>
                    </ul>

                    <!-- /.nav-second-level -->
                </li>                
            </ul>
        </div        
        <!-- /.sidebar-collapse -->
    </div>    
    <!-- /.navbar-static-side -->
</nav>