<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verificar si se ha enviado el ID de la materia
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];  // Obtener el ID de la materia desde la URL

    // Consulta para obtener los datos de la materia
    $query = "SELECT * FROM Materias WHERE Clave_M = ?";
    $stmt = $conn->prepare($query);  // Prepara la consulta para evitar inyecciones SQL
    $stmt->bind_param("i", $id);  // Vincula el ID como parámetro
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Si no se encuentran resultados, redirige al listado
    if ($result->num_rows === 0) {
        header("Location: listar.php?mensaje=error");
        exit();
    }

    // Obtener los datos de la materia
    $materia = $result->fetch_assoc();

    // Cerrar la declaración
    $stmt->close();
} else {
    // Si no se proporciona un ID válido, redirige al listado
    header("Location: listar.php?mensaje=error");
    exit();
}

// Verificar si se ha enviado el formulario para actualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $nombreMateria = $_POST['nombreMateria'];
    $creditosMateria = $_POST['creditosMateria'];

    // Validar que los campos no estén vacíos
    if (empty($nombreMateria) || empty($creditosMateria)) {
        echo "Todos los campos son requeridos.";
    } else {
        // Consulta para actualizar la materia
        $updateQuery = "UPDATE Materias SET Nom_M = ?, Cred_M = ? WHERE Clave_M = ?";
        $stmtUpdate = $conn->prepare($updateQuery);
        $stmtUpdate->bind_param("sii", $nombreMateria, $creditosMateria, $id);  // Vincula los parámetros

        // Ejecutar la actualización
        if ($stmtUpdate->execute()) {
            // Redirige al listado con un mensaje de éxito
            header("Location: listar.php?mensaje=actualizado");
            exit();
        } else {
            // Si hay un error en la actualización
            echo "Error al actualizar la materia: " . $conn->error;
        }

        // Cerrar la declaración
        $stmtUpdate->close();
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Materia</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="text-center">Editar Materia</h1>
    
    <!-- Formulario de edición -->
    <form action="editar.php?id=<?php echo $materia['Clave_M']; ?>" method="POST">
        <div class="mb-3">
            <label for="nombreMateria" class="form-label">Nombre de la Materia</label>
            <input type="text" class="form-control" id="nombreMateria" name="nombreMateria" value="<?php echo $materia['Nom_M']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="creditosMateria" class="form-label">Créditos</label>
            <input type="number" class="form-control" id="creditosMateria" name="creditosMateria" value="<?php echo $materia['Cred_M']; ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar Materia</button>
        <a href="listar.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
