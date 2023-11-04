<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "pickup");
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $consulta = "SELECT * FROM usuarios WHERE nombre_usuario='$username' AND contrasena='$password'";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {
        $_SESSION['username'] = $username;
        header("Location: inicio.html");
    } else {
        header("Location: error copy.html");
    }
}
$conexion->close();
?>
