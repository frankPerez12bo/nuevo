<?php
// Conexión a la base de datos
include '../conexion.php';

// Verifica si se ha enviado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // ID del alumno a eliminar

    // Consulta para eliminar el registro
    $sql = "DELETE FROM alumno WHERE Mat_alumno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirigir al listado después de eliminar
        header("Location: listar.php?mensaje=eliminado");
        exit();
    } else {
        // Mostrar error si no se pudo eliminar
        echo "Error al eliminar el alumno: " . $conn->error;
    }

    // Cierra la declaración
    $stmt->close();
} else {
    echo "ID de alumno no válido.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
