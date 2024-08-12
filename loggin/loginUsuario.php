<?php
session_start();
$idusuarios = $_SESSION["idUsuarios"];
if ($idusuarios != "") {
    echo "Ya tienes iniciada una sesión";
    echo '<meta http-equiv="refresh" content="0;url=layout/log.php">';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="logg1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        
    </style>
</head>
<body>
<video autoplay muted loop>
    <source src="Sportii.mp4" type="video/mp4">
</video>
    <div class="login-box">
        <h2>Iniciar sesión</h2>
        <form method="Post" action="validarUs.php">
            <div class="user-box">
                <input type="text" name="usuario" id="usuario" required>
                <label for="usuario">Nombre de usuario</label>
            </div>
            <div class="user-box">
                <input type="password" name="contrasena" id="password" required>
                <label for="password">Contraseña</label>
            </div>
            <input class="btn" type="submit" value="Iniciar sesión">
            <br>
            <br>
            <a href="registro.php">¿No tienes cuenta?, regístrate aquí</a>
        </form>
    </div>
</body>
</html>
