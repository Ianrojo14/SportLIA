<?php
// Obtén los datos del formulario
$idproductos = $_POST['idproductos'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$cantidad = $_POST['product-quanity']; // Ajusta el nombre del campo según el formulario

include "conexion.php";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Prevenir inyección SQL utilizando sentencias preparadas
$stmt = $conn->prepare("INSERT INTO carrito (idproductos, nombre, precio, cantidad) VALUES (?, ?, ?, ?)");
$stmt->bind_param("isii", $idproductos, $nombre, $precio, $cantidad);

if ($stmt->execute()) {
    // Verificar si se agregó correctamente
    $stmt->close();

    // Redirecciona a shop-single.php
    header("Refresh:1; url=shop.php");
    exit(); // Asegúrate de agregar exit aquí
} else {
    // Manejar el caso en que no se pudo agregar el producto al carrito
    echo "Error al agregar el producto al carrito.";
}

?>
