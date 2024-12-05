<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verificar si se ha enviado un ID válido
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar los datos del profesor para mostrarlos en el formulario
    $sql = "SELECT * FROM Profesores WHERE Clave_P = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $profesor = $result->fetch_assoc();

    if (!$profesor) {
        echo "No se encontró el profesor con el ID especificado.";
        exit();
    }
} else {
    echo "ID de profesor no válido.";
    exit();
}

// Verificar si se ha enviado el formulario para actualizar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['Nom_P'];
    $direccion = $_POST['Dir_P'];
    $telefono = $_POST['Tel_P'];
    $horario = $_POST['Hor_P'];

    // Validar los campos obligatorios
    if (empty($nombre) || empty($direccion) || empty($telefono) || empty($horario)) {
        $mensaje = "Todos los campos son obligatorios.";
    } else {
        // Actualizar los datos en la base de datos
        $sql = "UPDATE Profesores SET Nom_P = ?, Dir_P = ?, Tel_P = ?, Hor_P = ? WHERE Clave_P = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $direccion, $telefono, $horario, $id);

        if ($stmt->execute()) {
            // Redirigir al listado con un mensaje de éxito
            header("Location: listar.php?mensaje=actualizado");
            exit();
        } else {
            $mensaje = "Error al actualizar el profesor: " . $conn->error;
        }
    }
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Profesor</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Editar Profesor</h1>

    <!-- Mostrar mensaje de error si existe -->
    <?php if (isset($mensaje)) { ?>
        <div class="alert alert-danger"><?php echo $mensaje; ?></div>
    <?php } ?>

    <!-- Formulario para editar los datos del profesor -->
    <form method="POST">
        <div class="mb-3">
            <label for="Nom_P" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nom_P" name="Nom_P" value="<?php echo $profesor['Nom_P']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Dir_P" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Dir_P" name="Dir_P" value="<?php echo $profesor['Dir_P']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Tel_P" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Tel_P" name="Tel_P" value="<?php echo $profesor['Tel_P']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Hor_P" class="form-label">Horario</label>
            <input type="text" class="form-control" id="Hor_P" name="Hor_P" value="<?php echo $profesor['Hor_P']; ?>" required>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
</body>
</html>
