<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "servicio_militar";

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
