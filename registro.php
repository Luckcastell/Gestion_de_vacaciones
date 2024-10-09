<!DOCTYPE html>
<html lang="es">            <!-- Lo  unico que faltaria es revisar como inserta la contraseña, --> 
<head>                      <!-- porque la inserta encriptada en la base de datos y no es lo mismo-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/registro.css">
    <title>Registro de sesión</title>
</head>
<body>
    <div class="tarjetaREGISTRO">
        <h2>Registro de Usuario</h2>
        <form action="registroBD.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br><br>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="clave" name="contrasena" required><br><br>

            <input type="submit" value="Registrar">
            <br>
        <center><a href="inicioEmpleado.php">¿Ya tienes cuenta?</a></center>
        </form>
    </div>
</body>
</html>