<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpotrLIA</title>
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
        <h2>Registrar Usuario</h2>
        <form action="guardadoRegistro.php" method="POST">
            <div class="user-box">
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                <label for="usuario">Nombre</label>
            </div>
            <div class="user-box">
                <input type="text" name="usuario" id="usuario" placeholder="Usuario">
                <label for="usuario">Usuario</label>
            </div>
            <div class="user-box">
                <input type="text" name="correo" id="correo" placeholder="Correo">
                <label for="correo">Correo</label>
            </div>
            <div class="user-box">
                <input type="text" name="contrasena" id="contrasena" placeholder="Contrasena">
                <label for="contraseña">Contraseña</label>
            </div>
                <input class="btn" type="submit" name="Registrar" value="registrar">
        </form>

</body>
</html>
