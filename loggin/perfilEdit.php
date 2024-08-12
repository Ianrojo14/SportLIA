<?php
session_start();

if (!isset($_SESSION["idUsuarios"])) {
    // El usuario no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: loginUsuario.php");
    exit();
}

include "conexion.php";
// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el ID de usuario de la sesión
$idUsuario = $_SESSION["idUsuarios"];

// Consulta SQL utilizando el ID de usuario de la sesión
$sql = "SELECT * FROM usuarios WHERE idUsuarios = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Mostrar los datos
    $row = $result->fetch_assoc(); // Obtén la primera fila

    $foto = $row["foto"];
    $nombre = $row["nombre"];
    $usuario = $row["usuario"];
    $correo = $row["correo"];
    $contrasena = $row["contrasena"];
    $descripcion = $row["descripcion"];
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        custom-element {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: lightblue;
        }

        .image {
            position: relative;
            height: 150px;
            width: 150px;
            border: none;
            border-radius: 75px;
            background-color: aliceblue;
            margin-bottom: 10px;
        }

        .container {
            display: flex;
            align-items: center;
            flex-direction: column;
            max-width: 300px;
            width: 100%;
            background-color: white;
            border-radius: 20px;
            padding: 20px;
            position: relative;
            box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0);
            transition: box-shadow ease-in-out 0.2s;
            cursor: pointer;
        }

        .container:hover {
            box-shadow: 0 0 20px 3px rgba(0, 0, 0, 0);
        }

        .container::before {
            content: '';
            position: absolute;
            height: auto; /* o un valor fijo */
            width: 100%;
            top: 0;
            background-image: linear-gradient(0deg, #b3e5c4 1%, #45ad2b);
            border-radius: 20px 20px 0 0;
        }

        .Name {
            font-size: 20px;
            font-weight: bold;
        }

        .Field {
            font-size: 15px;
            font-weight: 100;
            color: rgb(143, 148, 148);
            margin: 6px 0 15px 0;
        }

        .button {
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
        }

        .input-box input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .button-regresar {
            display: inline-block;
            margin-top: 15px; /* Ajusta el margen según sea necesario */
            padding: 8px 15px;
            background-color: #777; /* Cambia el color de fondo según tus preferencias */
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease; /* Añade una transición de color de fondo */
        }

        .button-regresar:hover {
            background-color: #007; /* Cambia el color al pasar el ratón sobre el botón */
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post" action="guardarPerfil.php">
            <div class="input-box">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="input-box">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" value="<?php echo $usuario; ?>">
            </div>
            <div class="input-box">
                <label for="correo">Correo:</label>
                <input type="text" name="correo" id="correo" value="<?php echo $correo; ?>">
            </div>
            <div class="input-box">
                <label for="contrasena">Contraseña:</label>
                <input type="text" name="contrasena" id="contrasena" value="<?php echo $contrasena; ?>">
            <div class="input-box">
                <label for="descripcion">Descripción:</label>
                <input type="text" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>">
            </div>
            <input type="submit" class="button" value="Guardar">
        </form>
         <br>
            <a href="../index.php" class="button-regresar">Regresar</a>
    </div>

    <script type="module" src="https://unpkg.com/@ionic/core@latest/dist/ionic/ionic.esm.js"></script>
</body>
</html>
