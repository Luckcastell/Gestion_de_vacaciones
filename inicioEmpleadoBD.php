<?php
    session_start();
    include('Conexion.php');

    if (isset($_POST['Nombre']) && isset($_POST['Clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strtolower($data);
            return $data;
        }

        $Empleado = validate($_POST['Nombre']);
        $Clave = validate($_POST['Clave']);

        if (empty($Empleado)) {
            header("Location: inicioEmpleado.php?error1=El Usuario es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: inicioEmpleado.php?error1=La Clave es requerida");
            exit();
        }
        else{
            // $Clave = md5($Clave);

            $sql = "SELECT * FROM empleados WHERE Nombre = '$Empleado' AND Clave = '$Clave'";
            $resultado = mysqli_query($conexion, $sql);

            if (mysqli_num_rows($resultado) === 1) {
                $row = mysqli_fetch_assoc($resultado);
                if($row['Nombre'] === $Empleado && $row['Clave'] === $Clave){
                    $_SESSION['Nombre'] = $row['Nombre'];
                    $_SESSION['id_empleado'] = $row['id_empleado'];
                    $_SESSION['CorreoElectronico'] = $row['CorreoElectronico'];
                    header("Location: Menu.php");
                    exit();
                }
                else{
                    header("Location: inicioEmpleado.php?error1=El Usuario o la Clave son incorrectas");
                    exit();
                }
            }
            else{
                header("Location: inicioEmpleado.php?error1=El Usuario o la Clave son incorrectas");
                exit();
                }
        }
    }
    else{
        header("Location: inicioEmpleado.php");
        exit();
    }

?>
