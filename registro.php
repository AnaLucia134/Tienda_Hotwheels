<?php
$conexion = new mysqli("localhost", "root", "", "pickup");
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}
if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $consulta = "INSERT INTO usuarios (nombre_usuario, correo, contrasena) VALUES ('$username', '$email', '$password')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: inicio.html");
    } else {
        header("Location: error.html");
    }
}
$conexion->close();
?>
