<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los valores enviados a través del formulario
    $nom_materia = $_POST['Nom_M'];
    $cred_materia = $_POST['Cred_M'];

    // Verificar que los campos no estén vacíos
    if (!empty($nom_materia) && !empty($cred_materia)) {
        // Consulta para insertar los datos en la tabla 'Materias'
        $query = "INSERT INTO Materias (Nom_M, Cred_M) VALUES (?, ?)";
        $stmt = $conn->prepare($query);  // Prepara la consulta

        // Vincula los parámetros y ejecuta la consulta
        $stmt->bind_param("si", $nom_materia, $cred_materia);
        if ($stmt->execute()) {
            // Si la inserción es exitosa, redirige al listado de materias
            header("Location: listar.php?mensaje=agregado");
            exit();
        } else {
            // Si hubo un error al ejecutar la consulta
            echo "Error al agregar la materia: " . $conn->error;
        }

        // Cierra la declaración preparada
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Agregar Materia</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Agregar Materia</h1>

    <!-- Formulario para agregar una nueva materia -->
    <form action="agregar.php" method="POST">
        <div class="mb-3">
            <label for="Nom_M" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="Nom_M" name="Nom_M" required>
        </div>
        <div class="mb-3">
            <label for="Cred_M" class="form-label">Créditos</label>
            <input type="number" class="form-control" id="Cred_M" name="Cred_M" required>
        </div>
        <button type="submit" class="btn btn-success">Agregar Materia</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
