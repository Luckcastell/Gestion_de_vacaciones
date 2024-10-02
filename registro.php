<?php
include 'src/conexionBD.php'; // Incluye la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Cambia "usuarios" a "empleados"
    $sql = "INSERT INTO empleados (nombre, apellido, direccion, telefono, email, contrasena) 
            VALUES ('$nombre', '$apellido', '$direccion', '$telefono', '$email', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        header("Location: iniciarSesion.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>