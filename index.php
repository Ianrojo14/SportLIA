<?php

include "conexion.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM productos WHERE idproductos IN (1, 2, 3,4,5,6)";
$result = $conn->query($sql);

$imagenes = array();

while ($row = $result->fetch_assoc()) {
    $nombre = $row["nombre"];
    $precio = $row["precio"];
    $imagen = $row["imagen"];
    
    $imagenes[] = $imagen; // Agregar la imagen al array
    $precios[] = $precio; // Agregar la imagen al array
    $nombres[] = $nombre; // Agregar la imagen al array
}

if ($result->num_rows > 0) {
    // Process the results
} else {
    echo "0 results";
}

$conn->close();
//exit();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>SportLIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="sp.png">
    <link rel="shortcut icon" type="image/x-icon" href="sp.png">


    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
<?php include "navBar.php"?>
    <!-- Close Top Nav -->


    <!-- Header -->
    <?php
    include "headerSinTienda.php";
    ?>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
   <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_01.jpg" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>SportLIA</b> Comercio electronico</h1>
                                <h3 class="h2">SportLIA donde la Pasión se Convierte en Poder</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_02.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Tus productos favoritos en un solo lugar</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./assets/img/banner_img_03.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">La primera riqueza es la salud</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Productos a ofrecer</h1>
                <p>
                    De distintas variedades, asi como todos los tamaños
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 p-5 mt-3">
            <img src="assets/img/<?php echo $imagenes[0];?>" class="pricing-header p-3 pb-md-4 mx-auto text-center">                
            <h5 class="text-center mt-3 mb-3">Balones</h5>

            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
            <img src="assets/img/<?php echo $imagenes[1];?>" class="pricing-header p-3 pb-md-4 mx-auto text-center">                
                <h2 class="h5 text-center mt-3 mb-3">Herramientas</h2>
                
            </div>
            <div class="col-12 col-md-4 p-5 mt-3">
            <img src="assets/img/<?php echo $imagenes[2];?>" class="pricing-header p-3 pb-md-4 mx-auto text-center">                
                <h2 class="h5 text-center mt-3 mb-3">Protectores</h2>
            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Productos destacados</h1>
                    <p>
                        Lo mejor de esta temporada
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.php?idproductos=4">
                            <img src="assets/img/<?php echo $imagenes[3];?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$<?php echo $precios[3];?></li>
                            </ul>
                            <a href="shop-single.php?idproductos=4" class="h2 text-decoration-none text-dark"><?php echo $nombres[3];?></a>
                            <p class="card-text">
                               protectores para el combate de diferentes artes marciales de calidad y duraderos
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.php?idproductos=5">
                            <img src="assets/img/<?php echo $imagenes[4];?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$<?php echo $precios[4];?></li>
                            </ul>
                            <a href="shop-single.php?idproductos=5" class="h2 text-decoration-none text-dark"><?php echo $nombres[4];?></a>
                            <p class="card-text">
                            Protector bucal Aparato de ortodoncia de 
                            dientes de Futbol Americano
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="shop-single.php?idproductos=6">
                            <img src="assets/img/<?php echo $imagenes[5];?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right">$<?php echo $precios[5];?></li>
                            </ul>
                            <a href="shop-single.php?idproductos=6" class="h2 text-decoration-none text-dark"><?php echo $nombres[5];?></a>
                            <p class="card-text">
                                El aluminio del bate de béisbol es adecuado para jugadores de tball juveniles, solo apto para pelotas blandas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


   <?php
   include "footer.php";
   ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>







</html>