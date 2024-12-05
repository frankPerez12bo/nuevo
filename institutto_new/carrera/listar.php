<?php
// Incluye el archivo de conexión a la base de datos
include '../conexion.php';

// Consulta SQL para obtener todos los registros de la tabla carrera
$sql = "SELECT Clave_C, Nom_C, Durac_C FROM carrera";
$resultado = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Carreras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Listado de Carreras</h1>
        
        <!-- Verifica si hay un mensaje en la URL -->
        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($_GET['mensaje']); ?>
            </div>
        <?php endif; ?>

        <!-- Tabla para mostrar los registros -->
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Clave</th>
                    <th>Nombre de la Carrera</th>
                    <th>Duración (Semestres)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while ($fila = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $fila['Clave_C']; ?></td>
                            <td><?php echo htmlspecialchars($fila['Nom_C']); ?></td>
                            <td><?php echo $fila['Durac_C']; ?></td>
                            <td>
                                <a href="editar.php?id=<?php echo $fila['Clave_C']; ?>" class="btn btn-primary btn-sm">Editar</a>
                                <a href="eliminar.php?id=<?php echo $fila['Clave_C']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta carrera?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No se encontraron registros</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Botón para agregar una nueva carrera -->
        <div class="text-center mt-4">
            <a href="agregar.php" class="btn btn-success">Agregar Carrera</a>
            <a href="http://localhost/institutto_new/" class="btn btn-warning mb-3 mt-3"><b>HOME</b></a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cierra la conexión a la base de datos
$conn->close();
?>
