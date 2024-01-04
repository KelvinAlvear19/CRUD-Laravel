<?php  
//editar
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    include 'conexion.php';
    $cedula=$_POST['est_cedula'];
    $nombre=$_POST['est_nombre'];
    $apellido=$_POST['est_apellido'];
    $telefono=$_POST['est_telefono'];
    $direccion=$_POST['est_direccion'];

    $sqlUpdate = "UPDATE estudiantes SET est_nombre='$nombre', est_apellido='$apellido', est_telefono='$telefono', est_direccion='$direccion' WHERE est_cedula='$cedula'";

    if($conn->query($sqlUpdate)===true){
        echo json_encode("OK");
    }else{
        echo json_encode("error");
    }

    $mysqli->close();
?>