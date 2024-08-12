<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "conexion.php";

session_start(); // Asegúrate de iniciar la sesión

if (isset($_SESSION['idUsuarios'], $_POST['nombre'], $_POST['usuario'], $_POST['correo'], $_POST['descripcion'])) {
    $idUsuario = $_SESSION['idUsuarios'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $descripcion = $_POST['descripcion'];

    // Verificar si se proporciona una nueva contraseña
    if (!empty($_POST['contrasena'])) {
        $contrasena = $_POST['contrasena'];
    } else {
        // Si no se proporciona una nueva contraseña, mantén la existente
        // (asumiendo que 'contrasena' es el nombre del campo en la base de datos)
        $contrasena = ''; // Cambio aquí, inicializa la variable
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    try {
        // Verificar si el usuario está actualizando su propio registro
        $checkUserQuery = $conn->prepare("SELECT * FROM usuarios WHERE idUsuarios = ?");
        $checkUserQuery->bind_param("i", $idUsuario);
        $checkUserQuery->execute();
        $checkUserResult = $checkUserQuery->get_result();

        if ($checkUserResult->num_rows === 1) {
            // El usuario existe, proceder con la actualización
            $checkUserQuery->close();

            // Prepared statement para prevenir la inyección SQL
            $stmt = $conn->prepare("UPDATE usuarios SET nombre=?, usuario=?, correo=?, contrasena=?, estatus=?, descripcion=? WHERE idUsuarios=?");

            $estatus = 1; // Suponiendo que 1 es el valor predeterminado para 'estatus'

            // Vincular los parámetros a la declaración
            $stmt->bind_param("ssssisi", $nombre, $usuario, $correo, $contrasena, $estatus, $descripcion, $idUsuario);

            if ($stmt->execute() === TRUE) {
                echo "Actualización exitosa";
                echo '<meta http-equiv="refresh" content="1;url=../index.php">'; // Corregido el redireccionamiento
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            // El usuario no tiene permisos para actualizar este registro
            echo "Error: No tienes permisos para actualizar este registro.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Faltan datos en el formulario o no has iniciado sesión.";
}
?>
