<?php
include "conexion.php";

$cedula = $_GET['est_cedula'];
$sqlselect = "SELECT est_cedula FROM estudiantes WHERE est_cedula = '$cedula'";
$respuesta = $conn->query($sqlselect);

if ($respuesta->num_rows > 0) {
    $result = "Bodega existe";
} else {
    $result = "Bodega no existe";
}

echo json_encode($result);
?>
