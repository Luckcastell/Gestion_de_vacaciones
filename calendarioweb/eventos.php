<?php
header('Content-Type: application/json');  //la cabecera que me va a indicar el contenido que va a devolver el json
$pdo = new PDO("mysql:dbname=sistema; host=127.0.0.1", "root", "");  // conectarme a la base de datos

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer'; // la variable accion va a preguntar si hay un valor en la variable get 
// y es diferente de vacio, va a asignar directamente ese valor a la variable accion, de lo contrario hay que poner la variable accion con el valor leer 

switch($accion){
    case 'agregar': 
        // instruccion de agregar 
        $sentenciaSQL = $pdo->prepare("INSERT INTO 
        eventos(title,descripcion,color,textColor,start,end) 
        VALUES(:title,:descripcion,:color,:textColor,:start,:end)"); 
       
       
        $respuesta = $sentenciaSQL ->execute(array(
            "title" => $_POST['title'], 
            "descripcion" => $_POST['descripcion'], 
            "color" => $_POST['color'], 
            "textColor" => $_POST['textColor'], 
            "start" => $_POST['start'], 
            "end" => $_POST['end']
        )); 

        // $respuesta = $sentenciaSQL ->execute(array(
        //     "title" => "muestra", 
        //     "descripcion" => "descricionmuestra", 
        //     "color" => 'green', 
        //     "textColor" => 'black', 
        //     "start" => '2024-10-16 00:00:00', 
        //     "end" => '2024-10-19 00:00:00'
        // )); 

        echo json_encode($respuesta) ; // muestra true si la instruccion se pudo llevar a cabo 
        break; 
    case 'eliminar': 
        // instruccion de eliminar 
        echo "instruccion de eliminar "; 
        break; 
    case 'modificar': 
        // instruccion de modificar 
        echo "instruccion de modificar "; 
        break; 
    default: 
     // seleccionar los eventos del calendario 
     $sentenciaSQL = $pdo->prepare("SELECT * FROM eventos");
     $sentenciaSQL->execute(); //ejecuta la sentencia 

     $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC); // consultar todos los registros y convertirlos a un arreglo 
     echo json_encode($resultado);  // convertir toda la informacion que me retorno la consulta a un formato json 
    break;
}


?>