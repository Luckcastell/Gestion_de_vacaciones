<?php
    session_start();   // Nos falta Terminar de dar los ultimos toques al codigo para iniciar como admin

    include('Conexion.php');

    if (isset($_POST['nombre']) && isset($_POST['clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Admin = validate($_POST['nombre']);
        $Clave = validate($_POST['clave']);

        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretKey ="6Lfm7lUqAAAAAGyD4MVXCXmhOp9plTjDIpN6AJSP";

        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha&remoteip=$ip");

        $atributos = json_decode($respuesta, true);

        if(!$atributos['success']){
            header("Location: inicioAdmin.php?error=Verificar captcha");
            exit();
        }
        elseif (empty($Admin)) {
            header("Location: inicioAdmin.php?error=El Usuario es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: inicioAdmin.php?error=La Clave es requerida");
            exit();
        }
        else{

            $sql = "SELECT * FROM admin WHERE nombre = '$Admin' AND clave = '$Clave'";
            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) === 1) {
                $row = mysqli_fetch_assoc($resultado);
                if($row['nombre'] === $Admin && $row['clave'] === $Clave){
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['id_admin'] = $row['id_admin'];
                    $_SESSION['email'] = $row['email'];
                    header("Location: perdirOVerVacacionesAdmin.php");
                    exit();
                }
                else{
                    header("Location: inicioAdmin.php?error=El Usuario o la Clave son incorrectas");
                    exit();
                }
            }
            else{
                header("Location: inicioAdmin.php?error=El Usuario o la Clave son incorrectas");
                exit();
            }
        }
    }
    else{
        header("Location: inicioAdmin.php");
        exit();
    }

?>