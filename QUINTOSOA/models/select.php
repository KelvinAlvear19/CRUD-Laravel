<?php
//select
include "conexion.php";
$sqlselect="select  est_cedula,est_nombre,est_apellido,est_telefono,est_direccion from estudiantes where activo=1";
$respuesta=$conn->query($sqlselect);
$result=array();
if($respuesta->num_rows>0)
{
    while($filaestudaintes=$respuesta->fetch_assoc())
    {
        array_push($result,$filaestudaintes);
    }
}
else{
    $result="no hay estudiantes";
}
echo json_encode($result);
?>