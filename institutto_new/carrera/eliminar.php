<?php
// Incluye el archivo de conexión a la base de datos
include '../conexion.php';

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // El ID de la carrera a eliminar

    // Consulta SQL para eliminar el registro con el ID correspondiente
    $sql = "DELETE FROM carrera WHERE Clave_C = ?";

    // Prepara la consulta SQL
    $stmt = $conn->prepare($sql);
    // Vincula el parámetro de la consulta con el ID
    $stmt->bind_param("i", $id);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Si se eliminó correctamente, redirige a listar.php con un mensaje de éxito
        header("Location: listar.php?mensaje=eliminado");
        exit();
    } else {
        // Si ocurre un error al eliminar, muestra un mensaje de error
        echo "Error al eliminar la carrera: " . $conn->error;
    }

    // Cierra la declaración SQL
    $stmt->close();
} else {
    // Si no se recibe un ID válido, muestra un mensaje de error
    echo "ID de carrera no válido.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
