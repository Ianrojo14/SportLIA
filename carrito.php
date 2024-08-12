<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Agrega tus etiquetas head aquí según sea necesario -->
</head>
<body>

    <h1>Carrito de Compras</h1>
    <br>
      <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td {
            color: #333;
        }

        .empty-cart {
            text-align: center;
            color: #555;
            font-style: italic;
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
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "conexion.php";
            
            // Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Verifica la conexión a la base de datos
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta los productos del carrito
            $sql = "SELECT * FROM carrito";
            
            // Verifica si la consulta se realiza correctamente
            $result = $conn->query($sql);

            if ($result === false) {
                echo "Error en la consulta: " . $conn->error;
            } elseif ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['precio'] . "</td>";
                    echo "<td>" . $row['cantidad'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>El carrito está vacío</td></tr>";
            }
            
            // Cierra la conexión a la base de datos
            $conn->close();
            ?>
        </tbody>
    </table>
                    <a href="shop.php" class="button-regresar">Regresar</a>


</body>
</html>
