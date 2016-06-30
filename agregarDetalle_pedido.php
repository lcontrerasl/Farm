<?php
$conexion = mysql_connect('localhost', 'root', '');
mysql_select_db('farm', $conexion);

$sql = 'SELECT * FROM producto'
        . ' INNER JOIN tipo_producto ON idTipo_producto = tipo_producto_idTipo_producto'
        . ' INNER JOIN unidad ON idUnidad = unidad_idUnidad'
        . ' WHERE idProducto = ' . $_GET['idProducto']
        . ' ORDER BY idProducto DESC';
mysql_query($sql);

$result = mysql_query($sql);
$productoAux;
if ($row = mysql_fetch_array($result)) {
    do {
        $productoAux = $row;
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
                    <h2><?= $productoAux['nombreProducto'] ?>/ <?= $productoAux['nombreTipo_producto'] ?></h2>
                    <p class="lead">Stock <?= $productoAux['stockProducto'] ?>/ <?= $productoAux['nombreUnidad'] ?>. </p>
                </div> 
                <div class="row contact-wrap"> 
                    <div class="status alert alert-success" style="display: none"></div>
                    <form class="contact-form" name="contact-form" method="post" action="accform/agregar_al_carro.php">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group">
                                <label>Ingrese la Cantidad *</label>
                                <input type="number" value="1" min="1" max="<?= $productoAux['stockProducto'] ?>" name="cantidadDetalle_pedido" class="form-control" required="required">
                                <br>
                                <input type="submit" value="Agregar" class="btn btn-success">
                            </div>
                        </div>
                        <div class="col-sm-5 col-sm-offset-1">
                            <img src="sistema/accform/uploads/<?= $productoAux['imgProducto'] ?>">                        
                        </div>
                        <input type="hidden" name="producto_idProducto" value="<?= $productoAux['idProducto'] ?>">
                        <input type="hidden" name="precio_actualDetalle_pedido" value="<?= $productoAux['precio_refProducto'] ?>"> 
                    </form> 
                </div><!--/.row-->
            </div><!--/.container-->
        </section><!--/#contact-page-->

        <section id="bottom">
            <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Company</h3>
                            <ul>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">We are hiring</a></li>
                                <li><a href="#">Meet the team</a></li>
                                <li><a href="#">Copyright</a></li>
                                <li><a href="#">Terms of use</a></li>
                                <li><a href="#">Privacy policy</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>    
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Support</h3>
                            <ul>
                                <li><a href="#">Faq</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Forum</a></li>
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Refund policy</a></li>
                                <li><a href="#">Ticket system</a></li>
                                <li><a href="#">Billing system</a></li>
                            </ul>
                        </div>    
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Developers</h3>
                            <ul>
                                <li><a href="#">Web Development</a></li>
                                <li><a href="#">SEO Marketing</a></li>
                                <li><a href="#">Theme</a></li>
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Email Marketing</a></li>
                                <li><a href="#">Plugin Development</a></li>
                                <li><a href="#">Article Writing</a></li>
                            </ul>
                        </div>    
                    </div><!--/.col-md-3-->

                    <div class="col-md-3 col-sm-6">
                        <div class="widget">
                            <h3>Our Partners</h3>
                            <ul>
                                <li><a href="#">Adipisicing Elit</a></li>
                                <li><a href="#">Eiusmod</a></li>
                                <li><a href="#">Tempor</a></li>
                                <li><a href="#">Veniam</a></li>
                                <li><a href="#">Exercitation</a></li>
                                <li><a href="#">Ullamco</a></li>
                                <li><a href="#">Laboris</a></li>
                            </ul>
                        </div>    
                    </div><!--/.col-md-3-->
                </div>
            </div>
        </section><!--/#bottom-->

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