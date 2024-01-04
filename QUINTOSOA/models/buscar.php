<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

include 'conexion.php';

$cedula = $_POST["busqueda"];
$sqlSelect = "SELECT  * FROM estudiantes WHERE est_cedula LIKE '".$cedula."%';"; 

$respuesta = $conn->query($sqlSelect); 
$result = array(); 

if($respuesta->num_rows > 0){ 
    while($row = $respuesta->fetch_assoc()){ 
        array_push($result, $row); 
    }
}else{ 
    echo json_encode("No hay repuesta");
}

echo json_encode($result)
?>