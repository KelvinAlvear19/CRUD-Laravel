<?php
//eliminar
include 'conexion.php';

$cedula = $_POST['est_cedula'];

$sqlDelete = "DELETE FROM estudiantes WHERE est_cedula='$cedula'";

if ($conn->query($sqlDelete) === true) {
    echo json_encode("OK");
} else {
    echo json_encode("Error");
}

$mysqli->close();

?>