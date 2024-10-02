<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS\indexPRUEBA.css">
    <title>Gestion de Vacaciones </title>
</head>
<body>
<header>
        <div class="back">
            <div class="menu container">
                <a href="#"><img class="log" src="imagenes\Logo_de_YPF.png" alt="logoYPF"></a>
                <input type="checkbox" id="menu">
                <nav class="navbar">
                    <ul>
                        <li><a href="registro.html">Registrarte</a></li>
                        <li><a href="#">Acerca De</a></li>
                        
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <nav class="menu1">
            <p class="botonRegistrarse" >Si no tienes cuenta ingresa aqui: <button class="botonRegistrarse"><a href="registro.php">Registrarse</a></button></p>
    </nav>
    <div class="titulo">
        <img class="imagenLogo" src="imagenes/imagenLogoRectangularConTexto2.png" height="160px" alt="Y P F">
    </div>
    <div class="tarjetaMadre">
        <div class="tarjeta">
            <div class="tituloT">
                Empleado
            </div>
            <div class="cuerpo">
                <img class="imagenTarjeta" src="imagenes/imagenPersonal.png" height="280px" alt="imagenAdministrador">
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
                <img class="imagenTarjeta" src="imagenes/imagenJefe.png" height="280px" alt="imagenAdministrador">
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