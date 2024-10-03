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

// Obtener el ID ingresado en el formulario
$id = $_POST['id'];

// Consultar la base de datos para verificar si el ID existe
$sql = "SELECT * FROM empleados WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Si el ID existe
    $row = $result->fetch_assoc();
    echo "ID: " . $row["id"];
} else {
    // Si el ID no existe
    echo "El ID ingresado no se encuentra en la base de datos.";
}
// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cargando</title>
</head>
<body>
    <div>
        <img src="imagenCarga.png" alt="cargando">
    </div>
</body>
</html>