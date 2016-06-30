<?php
session_start();
if (isset($_SESSION['detalle_pedidos'])) {
    $detalle_pedidosAux = $_SESSION['detalle_pedidos'];
} else {
    header('Location: http://localhost/farm/productos.php');
}

$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);

$sql = 'SELECT * FROM producto'
        . ' INNER JOIN tipo_producto ON idTipo_producto = tipo_producto_idTipo_producto'
        . ' INNER JOIN unidad ON idUnidad = unidad_idUnidad'
        . ' ORDER BY idProducto DESC';
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
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Agregar Productos</title>

        <!-- core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/prettyPhoto.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>

        <?php
        include_once './componentes/header.php';
        ?> 
        <!--/header-->

        <section id="contact-info">

        </section>  <!--/gmap_area -->

        <section id="contact-page">
            <div class="container">
                <div class="center">        
                    <h2>Detalle del Pedido</h2>
                    <p class="lead">Listado de Productos a Solicitar</p>
                </div> 
                <div class="row contact-wrap"> 
                    <div class="status alert alert-success" style="display: none"></div>
                    <form class="" name="contact-form" method="post" action="accform/procesar_carro.php">
                        <div class="col-sm-10 col-sm-offset-1">
                            <ul class="list-group">
                                <?php
                                $total = 0;
                                for ($i = 0; $i < count($productos); $i++) {
                                    $productoAux = $productos[$i];
                                    for ($j = 0; $j < count($detalle_pedidosAux); $j++) {
                                        $detalle_pedidoAux = $detalle_pedidosAux[$j];
                                        if ($productoAux['idProducto'] == $detalle_pedidoAux['producto_idProducto']) {
                                            ?>
                                            <li class="list-group-item">
                                                <p>
                                                    <strong>
                                                        Producto:
                                                    </strong>
                                                    <?= $productoAux['nombreProducto'] ?>
                                                </p>
                                                <p>
                                                    <strong>
                                                        Cantidad:
                                                    </strong>
                                                    <?= $detalle_pedidoAux['cantidadDetalle_pedido'] . '/ ' . $productoAux['nombreUnidad'] ?>
                                                </p>
                                                <p>
                                                    <strong>
                                                        Precio:
                                                    </strong>
                                                    <?= '$' . $detalle_pedidoAux['precio_actualDetalle_pedido'] ?>
                                                </p>
                                                <p>
                                                    <strong>
                                                        Total:
                                                    </strong>
                                                    <?= '$' . ((int) $detalle_pedidoAux['cantidadDetalle_pedido'] * (int) $detalle_pedidoAux['precio_actualDetalle_pedido']) ?>
                                                </p>
                                                <img src="sistema/accform/uploads/<?= $productoAux['imgProducto'] ?>">
                                            </li>
                                            <?php
                                            $total+=((int) $detalle_pedidoAux['cantidadDetalle_pedido'] * (int) $detalle_pedidoAux['precio_actualDetalle_pedido']);
                                        }
                                    }
                                }
                                ?>
                            </ul>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h2>
                                        Total $<?= $total ?>
                                    </h2>
                                    <div class="form-group">
                                        <label>Ingrese su Rut</label>
                                        <input class="form-control" type="text" name="rutCliente" required="">
                                    </div>
                                    <p>
                                        <input type="submit" class="btn btn-success" velue="Enviar">
                                    </p>
                                </li>
                            </ul>

                        </div>
                    </form> 
                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#contact-page-->

        <?php
        include_once './componentes/footer.php';
        ?> 
        <!--/#footer-->

        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/wow.min.js"></script>
    </body>
</html>