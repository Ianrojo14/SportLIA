<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "conexion.php";

// Verifica que los datos POST estén presentes
if (
    isset($_POST['nombre'], $_POST['usuario'], $_POST['correo'], $_POST['contrasena'])
) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica la conexión a la base de datos
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    try {
        // Prepared statement para prevenir la inyección SQL
        $stmt = $conn->prepare("INSERT INTO usuarios (nombre, usuario, correo, contrasena, estatus, descripcion) VALUES (?, ?, ?, ?, ?, ?)");
        $estatus = 1; // Suponiendo que 1 es el valor predeterminado para 'estatus'
        $descripcion = ""; // Suponiendo un valor predeterminado para 'descripcion'

        // Vincula los parámetros a la declaración
        $stmt->bind_param("ssssis", $nombre, $usuario, $correo, $contrasena, $estatus, $descripcion);

        // Ejecuta la consulta
        if ($stmt->execute() === TRUE) {
            echo "Registro exitoso";
            echo '<script>window.location.href = "loginUsuario.php";</script>';
        } else {
            echo "Error: " . $stmt->error;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cierra el statement y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Faltan datos en el formulario.";
}
?>
