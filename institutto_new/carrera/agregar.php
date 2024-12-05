<?php
// Incluye el archivo de conexión a la base de datos
include '../conexion.php';

// Procesar el formulario si se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_carrera = $_POST['nom_carrera'];
    $duracion = $_POST['duracion'];

    // Validar que no estén vacíos
    if (!empty($nom_carrera) && !empty($duracion) && is_numeric($duracion)) {
        // Preparar la consulta SQL para insertar los datos
        $sql = "INSERT INTO carrera (Nom_C, Durac_C) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nom_carrera, $duracion);

        if ($stmt->execute()) {
            // Redirigir con un mensaje de éxito
            header("Location: listar.php?mensaje=agregado");
            exit();
        } else {
            $error = "Error al agregar la carrera: " . $conn->error;
        }

        // Cierra la declaración
        $stmt->close();
    } else {
        $error = "Por favor, completa todos los campos correctamente.";
    }
}

// Cierra la conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Carrera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Agregar Carrera</h1>

        <!-- Mostrar errores si existen -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <!-- Formulario para agregar carrera -->
        <form action="agregar.php" method="POST">
            <div class="mb-3">
                <label for="nom_carrera" class="form-label">Nombre de la Carrera</label>
                <input type="text" name="nom_carrera" id="nom_carrera" class="form-control" placeholder="Ejemplo: Ingeniería en Sistemas" required>
            </div>

            <div class="mb-3">
                <label for="duracion" class="form-label">Duración (Semestres)</label>
                <input type="number" name="duracion" id="duracion" class="form-control" placeholder="Ejemplo: 8" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <a href="listar.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form> 
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
