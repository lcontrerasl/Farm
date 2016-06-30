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
        <title>Productos</title>
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

        <section id="portfolio">
            <div class="container">
                <div class="center">
                    <h2>Productos</h2>
                    <p class="lead">Nuestros productos son ...</p>
                </div>


                <ul class="portfolio-filter text-center">
                    <?php
                    for ($i = 0; $i < count($tipo_productos); $i++) {
                        $tipo_productoAux = $tipo_productos[$i];
                        ?>
                        <li><a class="btn btn-default" href="#" data-filter=".<?= $tipo_productoAux['idTipo_producto'] ?>"><?= $tipo_productoAux['nombreTipo_producto'] ?></a></li>
                        <?php
                    }
                    ?>
                </ul><!--/#portfolio-filter-->

                <div class="row">
                    <div class="portfolio-items">
                        <?php
                        for ($i = 0; $i < count($productos); $i++) {
                            $productoAux = $productos[$i];
                            ?>
                            <div class="portfolio-item joomla <?= $productoAux['tipo_producto_idTipo_producto'] ?> col-xs-12 col-sm-4 col-md-3">
                                <div class="recent-work-wrap">
                                    <img class="img-responsive" src="sistema/accform/uploads/<?= $productoAux['imgProducto'] ?>" alt="">
                                    <div class="overlay">
                                        <div class="recent-work-inner">
                                            <h3><a href="#"><?= $productoAux['nombreProducto'] ?></a></h3>
                                            <p>Stock <?= $productoAux['stockProducto'] ?>/ <?= $productoAux['nombreUnidad'] ?></p>
                                            <a class="preview" href="agregarDetalle_pedido.php?idProducto=<?= $productoAux['idProducto'] ?>">
                                                <i class="fa fa-shopping-cart">

                                                </i> 
                                                Agregar
                                            </a>
                                        </div> 
                                    </div>
                                </div>          
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section><!--/#portfolio-item-->

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
