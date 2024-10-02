<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Gestion de Vacaciones </title>
</head>
<body>
    <nav class="menu">
            <p class="botonRegistrarse" >Si no tienes cuenta ingresa aqui: <button class="botonRegistrarse"><a href="registro.html">Registrarse</a></button></p>
    </nav>
    <div class="titulo">
        <img class="imagenLogo" src="imagenes/imagenLogoRectangularConTexto2.png" height="160px" alt="Y P F">
    </div>
    <div id="tarjetaMadre">
        <div class="tarjeta">
            <div class="tituloT">
                Empleado
            </div>
            <div class="cuerpo">
                <img class="imagenTarjeta" src="imagenes/imagenPersonal.png" height="280px" alt="imagenAdministrador"><!-- <br>
                Si sos un empleado de cualquier puesto que quiere vacaciones entra aca.-->
            </div>
            <div class="pie">     
                <form action="inicioEmpleado.php" method="post">
                    <button type="submit">Iniciar como Empleado</button>
                </form>
            </div>
        </div>
        <div class="tarjeta">
            <div class="tituloT">
                Administrador
            </div>
            <div class="cuerpo">
                <img class="imagenTarjeta" src="imagenes/imagenJefe.png" height="280px" alt="imagenAdministrador"><!-- <br>
                Si sos un administrador que quiere revisar o gestionar vacaciones entra aca.-->
            </div>
            <div class="pie">
                <form action="inicioAdmin.html" method="post">
                    <button type="submit">Iniciar como administrador</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>