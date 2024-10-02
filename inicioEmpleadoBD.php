<?php
    session_start();
    include('Conexion.php');

    if (isset($_POST['nombre']) && isset($_POST['clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Empleado = validate($_POST['nombre']);
        $Clave = validate($_POST['clave']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey ="6Lfm7lUqAAAAAGyD4MVXCXmhOp9plTjDIpN6AJSP";

        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");

        $atributos = json_decode($respuesta, true);

        if(!$atributos['success']){
            header("Location: inicioEmpleado.php?error=Verificar captcha");
            exit();
        }
        elseif (empty($Empleado)) {
            header("Location: inicioEmpleado.php?error=El Usuario es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: inicioEmpleado.php?error=La Clave es requerida");
            exit();
        }
        else{

            $sql = "SELECT * FROM empleados WHERE nombre = '$Empleado' AND clave = '$Clave'";
            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) === 1) {
                $row = mysqli_fetch_assoc($resultado);
                if($row['nombre'] === $Empleado && $row['clave'] === $Clave){
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['id_empleado'] = $row['id_empleado'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: Menu.php");
                    exit();
                }
                else{
                    header("Location: inicioEmpleado.php?error=El Usuario o la Clave son incorrectas");
                    exit();
                }
            }
            else{
                header("Location: inicioEmpleado.php?error=El Usuario o la Clave son incorrectas");
                exit();
                }
        }
    }
    else{
        header("Location: inicioEmpleado.php");
        exit();
    }

?>
