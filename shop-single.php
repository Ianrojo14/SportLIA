<?php
include "conexion.php";

$idproductos = "";

// Verifica si se ha proporcionado un ID de producto en la URL
if (isset($_GET["idproductos"])) {
    $idproductos = $_GET["idproductos"];

    // Conecta a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para obtener los detalles del producto
    
$sql = "SELECT * FROM productos WHERE idproductos IN (1, 2, 3,4,5,6,7, 8, 9)";
$result = $conn->query($sql);
    $sql = "SELECT nombre, precio, imagen, marca, descripcion, color FROM productos WHERE idproductos = ?";

    // Prepara y ejecuta la declaración
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $idproductos);
        $stmt->execute();
        $stmt->bind_result($nombre, $precio, $imagen, $marca, $descripcion, $color);
        $stmt->fetch();
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
} else {
    // Si no se proporcionó un ID de producto en la URL, puedes establecer valores predeterminados aquí.
    $nombre = "Nombre no proporcionado";
    $precio = "Precio no proporcionado";
    $imagen = "Imagen no proporcionada";
    $marca = "Marca no proporcionada";
    $descripcion = "Descripción no proporcionada";
    $color = "Color no proporcionado";
}

// Resto de tu código...
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SportLIA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
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



    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="assets/img/<?php echo $imagen;?>" alt="Card image cap" id="product-detail">
                    </div>
                    
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?php echo $nombre; ?></h1>
                            <p class="h3 py-2">$<?php echo $precio; ?></p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 comentarios</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Marca:</h6>
                                    <p><?php echo $marca; ?></p>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong></strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p><?php echo $descripcion; ?></p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Colores disponibles:</h6>
                                     <p><?php echo $color; ?></p>
                                </li>
                                <!--<li class="list-inline-item">-->
                                <!--    <p class="text-muted"><strong>White / Black</strong></p>-->
                                <!--</li>-->
                            </ul>

                           

<form action="guardarCarrito.php" method="POST"                            
<input type="hidden" name="idproductos" value="<?php echo $idproductos; ?>">
    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
    <input type="hidden" name="precio" value="<?php echo $precio; ?>">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                cantidad
                                                <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="btnAccion" value="agregar">Agregar al carrito</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
    <br></br>
      <!-- Start Brands -->
    <section class="bg-light py-5">
        <div class="container my-4">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">nuestras marcas</h1>
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

    <!-- Footer -->

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

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>