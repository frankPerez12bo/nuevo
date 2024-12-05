<?php
// Conexión a la base de datos
include '../conexion.php';

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir el ID a un número entero

    // Consulta para obtener los datos actuales del alumno
    $sql = "SELECT * FROM alumno WHERE Mat_alumno = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $alumno = $resultado->fetch_assoc(); // Obtener los datos del alumno
    } else {
        echo "Alumno no encontrado.";
        exit();
    }

    // Cerrar consulta de obtención de datos
    $stmt->close();
} else {
    echo "ID de alumno no válido.";
    exit();
}

// Manejo de la solicitud POST para actualizar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre']);
    $edad = intval($_POST['edad']);
    $semestre = intval($_POST['semestre']);
    $genero = trim($_POST['genero']);
    $clave_curso = intval($_POST['clave_curso']);

    // Validación básica
    if (empty($nombre) || $edad <= 0 || $semestre <= 0 || empty($genero) || $clave_curso <= 0) {
        $error = "Todos los campos son obligatorios y deben ser válidos.";
    } else {
        // Actualizar los datos en la base de datos
        $sql_update = "UPDATE alumno SET Nom_alumno = ?, Edad_alumno = ?, Sem_alumno = ?, Gen_alumno = ?, Clave_C = ? WHERE Mat_alumno = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("siisii", $nombre, $edad, $semestre, $genero, $clave_curso, $id);

        if ($stmt_update->execute()) {
            // Redirigir al listado con un mensaje de éxito
            header("Location: listar.php?mensaje=actualizado");
            exit();
        } else {
            $error = "Error al actualizar el alumno: " . $conn->error;
        }

        // Cierra la consulta de actualización
        $stmt_update->close();
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Alumno</h1>

        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="editar.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo htmlspecialchars($alumno['Nom_alumno']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" name="edad" id="edad" class="form-control" value="<?php echo htmlspecialchars($alumno['Edad_alumno']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="semestre" class="form-label">Semestre:</label>
                <input type="number" name="semestre" id="semestre" class="form-control" value="<?php echo htmlspecialchars($alumno['Sem_alumno']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <select name="genero" id="genero" class="form-control" required>
                    <option value="M" <?php echo $alumno['Gen_alumno'] === 'M' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="F" <?php echo $alumno['Gen_alumno'] === 'F' ? 'selected' : ''; ?>>Femenino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="clave_curso" class="form-label">Clave del Curso:</label>
                <input type="number" name="clave_curso" id="clave_curso" class="form-control" value="<?php echo htmlspecialchars($alumno['Clave_C']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
