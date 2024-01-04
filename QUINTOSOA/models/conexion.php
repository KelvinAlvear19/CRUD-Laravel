<?php
$servername="localhost";
$username="root";
$password="";
$database="restsoa";

$conn=mysqli_connect($servername,$username,$password,$database);
$mysqli=new mysqli($servername,$username,$password,$database);
if(!$mysqli){
    die("error".mysqli_connect_error());
}
?>