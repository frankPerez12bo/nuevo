<?php
// Conexión a la base de datos
$host = 'localhost';
$dbname = 'mi_base_datos';
$user = 'root';
$password = '';

// Intentamos conectar con MySQL usando PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Verificamos si se ha enviado el formulario y si hay un archivo
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
    // Extraemos la información del archivo
    $nombreImagen = $_FILES['imagen']['name'];  // Nombre del archivo
    $tipoImagen = $_FILES['imagen']['type'];    // Tipo MIME del archivo
    $rutaTemporal = $_FILES['imagen']['tmp_name'];  // Ruta temporal del archivo subido

    // Definimos la carpeta de destino donde se guardará la imagen
    $carpetaDestino = 'uploads/';

    // Creamos la ruta final combinando la carpeta de destino con el nombre del archivo
    $rutaFinal = $carpetaDestino . basename($nombreImagen);

    // Verificamos si el archivo es una imagen válida
    $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($tipoImagen, $tiposPermitidos)) {
        die("Error: Solo se permiten archivos JPG, PNG o GIF.");
    }

    // Movemos la imagen desde la ruta temporal a la carpeta de destino
    if (move_uploaded_file($rutaTemporal, $rutaFinal)) {
        // Preparamos la consulta para insertar la información en la base de datos
        $sql = "INSERT INTO imagenes (nombre, ruta) VALUES (:nombre, :ruta)";
        $stmt = $conn->prepare($sql);

        // Ejecutamos la consulta con los datos proporcionados
        $stmt->execute([
            ':nombre' => $nombreImagen,
            ':ruta' => $rutaFinal
        ]);

        echo "Imagen subida y guardada exitosamente.";
    } else {
        echo "Error al mover la imagen a la carpeta de destino.";
    }
} else {
    echo "No se ha enviado ninguna imagen.";
}
?>
