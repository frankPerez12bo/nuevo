<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verifica si se ha proporcionado un ID válido en la URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Recuperar el ID de la materia desde la URL
    $id = $_GET['id'];

    // Consulta SQL para eliminar la materia de la base de datos
    $query = "DELETE FROM Materias WHERE Clave_M = ?";
    $stmt = $conn->prepare($query);  // Prepara la consulta SQL para evitar inyecciones SQL

    // Vincula el parámetro de la consulta y ejecuta la consulta
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Si la eliminación es exitosa, redirige al listado de materias con un mensaje de éxito
        header("Location: listar.php?mensaje=eliminado");
        exit();
    } else {
        // Si hubo un error al ejecutar la consulta
        echo "Error al eliminar la materia: " . $conn->error;
    }

    // Cierra la declaración preparada
    $stmt->close();
} else {
    // Si no se proporciona un ID válido
    echo "ID de materia no válido.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
