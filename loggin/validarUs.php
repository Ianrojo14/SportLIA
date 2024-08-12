<?php
include "conexion.php";

// Verificar si se enviaron los datos de usuario y contraseña
if (isset($_POST['usuario'], $_POST['contrasena'])) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta preparada para prevenir la inyección SQL
    $stmt = $conn->prepare("SELECT idUsuarios, usuario, estatus FROM usuarios WHERE usuario=? AND contrasena=?");
    $stmt->bind_param("ss", $usuario, $contrasena);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener resultados
    $stmt->bind_result($idUsuarios, $usuario, $estatus);

    // Verificar si hay resultados
    if ($stmt->fetch()) {
        // Validar el estatus del usuario
        if ($estatus == 1) {
            // Iniciar sesión
            session_start();
            $_SESSION["idUsuarios"] = $idUsuarios;
            $_SESSION["usuario"] = $usuario;

            // Redirigir a la página de inicio
             echo "Bienvenido ". $row["usuario"];
            echo '<meta http-equiv="refresh" content="1;url=../index.php">';
        } else {
            echo "Usuario inactivo. Por favor, contacta al administrador.";
        }
    } else {
        echo "Login incorrecto";
        echo '<meta http-equiv="refresh" content="2;url=loginUsuario.php">';
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Faltan datos en el formulario.";
}
?>
