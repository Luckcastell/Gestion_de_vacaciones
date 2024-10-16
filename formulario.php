<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        // Si no hay sesión iniciada, redirige al Inicio :)
        header("Location: index.php");
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="es">      
<head>                      <!-- y darle diseño con el archivo .css -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedir Vacaciones</title>
    <script>
        function validarFechas() {
            const fechaA = new Date(document.getElementById("fechaA").value);
            const fechaB = new Date(document.getElementById("fechaB").value);

            if (fechaB <= fechaA) {
                alert("La fecha final debe ser mayor que la fecha inicial.");
                return false; // Detenemos el envío del formulario
            }

            return true; // Permitimos el envío del formulario si es válido
        }
    </script>
</head>
<body>
    <form action="guardar.php" method="POST" onsubmit="return validarFechas();">
    <?php
            if (isset($_GET['uf'])) {
            ?>
            <p>
                <?php
                    echo $_GET['uf']
                 ?>
            </p>
        <?php
            }
        ?>    
    <br>
        <label for="Nombre">Nombre y apellido:</label>
        <input type="string" id="Nombre" name="nombre" required><br><br>

        <label for="fechaA">Fecha Inicio:</label>
        <input type="date" id="fechaA" name="fecha_inicio" required><br><br>

        <label for="fechaB">Fecha Final:</label>
        <input type="date" id="fechaB" name="fecha_final" required><br><br>

        <button type="submit">Guardar Fechas</button>
    </form>
</body>
</html>