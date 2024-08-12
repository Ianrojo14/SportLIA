<?php

include "conexion.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM productos WHERE idproductos IN (1, 2, 3,4,5,6,7, 8, 9)";
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
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <style>
        #consulta {
            width: 200px; /* Puedes ajustar el ancho según tus preferencias */
        }
    </style>
    
    <script>
        function clearPlaceholder() {
            document.getElementById('consulta').placeholder = '';
        }
    </script>
         <link rel="apple-touch-icon" href="sp.png">
    <link rel="shortcut icon" type="image/x-icon" href="sp.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
    include "headerTienda.php";
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

</body>
</html>



    <!-- Start Content -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
                <h1 class="h2 pb-4">Categorias</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Balones
                        </a>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Protectores
                        </a>
                       
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">
                            Herramientas
                        </a>
                       
                    </li>
                </ul>
            </div>

            <div class="col-lg-9">
                <div class="row">
                       <!-- Start productos -->

      

                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $imagenes[3];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproductos=4"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $nombres[3];?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $precios[3];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $imagenes[4];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproductos=5"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $nombres[4];?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $precios[4];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $imagenes[5];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproductos=6"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $nombres[5];?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $precios[5];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $imagenes[6];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproductos=7"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $nombres[6];?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $precios[6];?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="assets/img/<?php echo $imagenes[7];?>">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.php?idproductos=8"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="shop-single.php" class="h3 text-decoration-none"><?php echo $nombres[7];?></a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">$<?php echo $precios[7];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Content -->

    <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Nuestras marcas</h1>
                </div>
                <div class="col-lg-9 m-auto tempaltemo-carousel">
                    <div class="row d-flex flex-row">
                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-light fas fa-chevron-left"></i>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Carousel Wrapper-->
                        <div class="col">
                            <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner product-links-wap" role="listbox">

                                    <!--First slide-->
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End First slide-->

                                    <!--Second slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Second slide-->

                                    <!--Third slide-->
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                            </div>
                                            <div class="col-3 p-md-5">
                                                <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Third slide-->

                                </div>
                                <!--End Slides-->
                            </div>
                        </div>
                        <!--End Carousel Wrapper-->

                        <!--Controls-->
                        <div class="col-1 align-self-center">
                            <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-light fas fa-chevron-right"></i>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Brands-->


    <!-- Start Footer -->
    <?php
    include "footer.php";
    ?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>