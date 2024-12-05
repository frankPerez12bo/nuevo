<?php
// Incluir la conexión a la base de datos
include "../conexion.php";

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['Nom_P'];
    $direccion = $_POST['Dir_P'];
    $telefono = $_POST['Tel_P'];
    $horario = $_POST['Hor_P'];

    // Validar que los campos obligatorios no estén vacíos
    if (!empty($nombre) && !empty($direccion) && !empty($telefono) && !empty($horario)) {
        // Insertar el nuevo profesor en la base de datos
        $sql = "INSERT INTO Profesores (Nom_P, Dir_P, Tel_P, Hor_P) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $direccion, $telefono, $horario);

        if ($stmt->execute()) {
            // Redirigir al listar con un mensaje de éxito
            header("Location: listar.php?mensaje=agregado");
            exit();
        } else {
            $error = "Error al agregar el profesor: " . $conn->error;
        }

        $stmt->close();
    } else {
        $error = "Todos los campos son obligatorios.";
    }
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
    <title>Agregar Profesor</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Agregar Profesor</h1>
    <a href="listar.php" class="btn btn-secondary mb-3">Regresar</a>

    <?php if (isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="Nom_P" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="Nom_P" name="Nom_P" required>
        </div>
        <div class="mb-3">
            <label for="Dir_P" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="Dir_P" name="Dir_P" required>
        </div>
        <div class="mb-3">
            <label for="Tel_P" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="Tel_P" name="Tel_P" required>
        </div>
        <div class="mb-3">
            <label for="Hor_P" class="form-label">Horario</label>
            <input type="text" class="form-control" id="Hor_P" name="Hor_P" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
</body>
</html>
