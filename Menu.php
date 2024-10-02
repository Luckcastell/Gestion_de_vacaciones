<!-- AL INICIAR SESIÓN, ENTRAMOS A ESTA PAGINA WEB -->
<?php
session_start();
if (!isset($_SESSION['Nombre'])) {
    // Si no hay sesión iniciada, redirige al Inicio :)
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>