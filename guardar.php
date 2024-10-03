<?php
$servidor = "localhost";
$User = "root";
$pass = "";
$BD = "vacaciones_BD";

// Crear conexión
$conexion = new mysqli($servidor, $User, $pass, $BD);

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Obtener los datos del formulario
$id_usuario = $_POST['id_usuario'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO vacaciones (id_usuario, fecha_inicio, fecha_final) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $id_usuario, $fecha_inicio, $fecha_final);

if ($stmt->execute()) {
    echo "Fechas guardadas correctamente.";
} else {
    echo "Error al guardar las fechas: " . $conn->error;
    }

// Cerrar la conexión
$stmt->close();
$conn->close();
?>