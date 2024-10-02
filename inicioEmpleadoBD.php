<?php
    session_start();
    include('Conexion.php');

    if (isset($_POST['nombre']) && isset($_POST['clave']) ) {
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = strtolower($data);
            return $data;
        }

        $Empleado = validate($_POST['nombre']);
        $Clave = validate($_POST['clave']);

        if (empty($Empleado)) {
            header("Location: inicioEmpleado.php?error1=El Usuario es requerido");
            exit();
        }
        elseif (empty($Clave)) {
            header("Location: inicioEmpleado.php?error1=La Clave es requerida");
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
