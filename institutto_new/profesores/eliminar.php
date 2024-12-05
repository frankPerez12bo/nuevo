<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verificar si se ha enviado un ID válido a través del método GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // ID del profesor a eliminar

    // Verificar si el usuario confirmó la eliminación
    if (isset($_GET['confirmar']) && $_GET['confirmar'] == 'si') {
        // Consulta para eliminar el registro
        $sql = "DELETE FROM Profesores WHERE Clave_P = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirigir al listar.php con un mensaje de éxito
            header("Location: listar.php?mensaje=eliminado");
            exit();
        } else {
            echo "Error al eliminar el profesor: " . $conn->error;
        }

        $stmt->close();
    }
} else {
    echo "ID de profesor no válido.";
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Eliminar Profesor</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Confirmar Eliminación</h1>

    <div class="alert alert-warning text-center">
        <p>¿Estás seguro de que deseas eliminar este profesor?</p>
        <p class="fw-bold">Esta acción no se puede deshacer.</p>
    </div>

    <div class="text-center">
        <!-- Botón para confirmar eliminación -->
        <a href="eliminar.php?id=<?php echo $id; ?>&confirmar=si" class="btn btn-danger">Sí, eliminar</a>
        <!-- Botón para cancelar eliminación y volver al listado -->
        <a href="listar.php" class="btn btn-secondary">No, regresar</a>
    </div>
</div>
</body>
</html>
