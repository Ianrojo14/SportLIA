<?php
session_start();
$idUsuarios=$_SESSION["idUsuarios"];
if ($idUsuarios=="") {
	echo "No tienes iniciada una sesion";
    echo '<meta http-equiv="refresh" content="0;url=../loginUsuario.php">';
  	exit();
}
include "conexion.php";
// AQUI VOY A CONSULTAR LOS DATOS DE LA PERSONA QUE INICIO SESION
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $nombre= $row["nombre"];
  }
} else {
  echo "No tienes iniciada una sesion";

}
$conn->close();
echo "Bienvenido : ".$nombre;
    echo '<meta http-equiv="refresh" content="0;url=../../index.php">';
?>