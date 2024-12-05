<?php
// Incluye el archivo de conexión a la base de datos
include '../conexion.php';

// Verifica si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id']; // El ID de la carrera a editar

    // Consulta SQL para obtener los datos de la carrera
    $sql = "SELECT * FROM carrera WHERE Clave_C = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Vincula el ID a la consulta

    // Ejecuta la consulta
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verifica si se encontró la carrera
    if ($resultado->num_rows > 0) {
        $carrera = $resultado->fetch_assoc(); // Obtiene los datos de la carrera
    } else {
        // Si no se encuentra la carrera, redirige al listado
        header("Location: listar.php?mensaje=no_encontrado");
        exit();
    }

    // Cierra la declaración
    $stmt->close();
} else {
    // Si no se recibe un ID válido, redirige al listado
    header("Location: listar.php?mensaje=id_no_valido");
    exit();
}

// Verifica si se ha enviado el formulario con los datos editados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibe los nuevos datos del formulario
    $nombre_carrera = $_POST['nombre_carrera'];
    $duracion_carrera = $_POST['duracion_carrera'];

    // Consulta SQL para actualizar los datos de la carrera
    $sql_update = "UPDATE carrera SET Nom_C = ?, Durac_C = ? WHERE Clave_C = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sii", $nombre_carrera, $duracion_carrera, $id); // Vincula los parámetros

    // Ejecuta la actualización
    if ($stmt_update->execute()) {
        // Si la actualización fue exitosa, redirige al listado con mensaje de éxito
        header("Location: listar.php?mensaje=actualizado");
        exit();
    } else {
        // Si ocurre un error al actualizar, muestra un mensaje de error
        echo "Error al actualizar la carrera: " . $conn->error;
    }

    // Cierra la declaración de la actualización
    $stmt_update->close();
}

// Cierra la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Carrera</h2>
        <form method="POST" action="editar.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="nombre_carrera">Nombre de la Carrera</label>
                <input type="text" id="nombre_carrera" name="nombre_carrera" class="form-control" value="<?php echo $carrera['Nom_C']; ?>" required>
            </div>

            <div class="form-group">
                <label for="duracion_carrera">Duración de la Carrera (en años)</label>
                <input type="number" id="duracion_carrera" name="duracion_carrera" class="form-control" value="<?php echo $carrera['Durac_C']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Carrera</button>
            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
