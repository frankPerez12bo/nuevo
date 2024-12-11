<?php
$servername = "localhost";
$username = "root";  // Usa el usuario de tu base de datos
$password = "";      // La contraseña de tu base de datos
$dbname = "persona"; // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
