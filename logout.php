<?php
session_start();
session_destroy();
header("Location: loggin/loginUsuario.php");
exit();
?>
