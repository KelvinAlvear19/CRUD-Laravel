<?php
//guardar
include "conexion.php";
if(isset($_POST['est_cedula'],$_POST['est_nombre'],$_POST['est_apellido'],$_POST['est_telefono'],$_POST['est_direccion'])){
$cedula=$_POST['est_cedula'];
$nombre=$_POST['est_nombre'];
$apellido=$_POST['est_apellido'];
$telefono=$_POST['est_telefono'];
$direccion=$_POST['est_direccion'];

$sqlInsert= "INSERT INTO estudiantes(est_cedula,est_nombre,est_apellido,est_telefono,est_direccion) VALUES('$cedula','$nombre','$apellido','$telefono','$direccion')";
if($mysqli->query($sqlInsert)==TRUE)
{
    echo json_encode("Se guardo correctamente");
}
else
{
    echo json_encode("No se guardo correctamente");
}
$mysqli->close();
}

?>
