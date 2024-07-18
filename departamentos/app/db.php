<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'depas';

$conexion = mysqli_connect('localhost','root','','depas');
$fecha =  new DateTime();
if ($conexion->error) {
    # code...
    die(mysqli_error($conexion));
} else {
    # code...
    echo "la conexion de hoy ".$fecha->format('Y-m-d')." exitosamente desde DB";
}
?>